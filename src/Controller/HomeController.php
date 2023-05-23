<?php

namespace App\Controller;

use Exception;
use GuzzleHttp\Client;
use App\Entity\Service;
use App\Entity\Demandes;
use App\Entity\Disponibilite;
use App\Form\DemandesType;
use App\Entity\Favori;
use App\Form\SearchType;
use App\Model\SearchData;
use App\Repository\DemandesRepository;
use App\Repository\DisponibiliteRepository;
use App\Repository\FavoriRepository;
use SendinBlue\Client\Configuration;
use App\Repository\ServiceRepository;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;



class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ServiceRepository $serviceRepository, EvenementRepository $evenementRepository, Request $request, DisponibiliteRepository $disponibiliteRepository): Response
    {

        /* $searchData = new SearchData();
        $form = $this->createForm(SearchType::class, $searchData);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            dd($request);
        } */

        return $this->render('home/index.html.twig', [
            /* 'form' => $form->createView(), */
            'services' => $serviceRepository->findAll(),
            'evenements' => $evenementRepository->findAll(),
            'disponibilites' => $disponibiliteRepository->findFirstDispo(),
        ]);
    }

    #[Route('/anniversaire', name: 'app_anniversaire')]
    public function Anniversaire(ServiceRepository $serviceRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'services' => $serviceRepository->findByEvent('Anniversaire'),
        ]);
    }

    #[Route('/mariage', name: 'app_mariage')]
    public function Mariage(ServiceRepository $serviceRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'services' => $serviceRepository->findByEvent('Mariage'),
        ]);
    }

    #[Route('/naissance', name: 'app_naissance')]
    public function Naissance(ServiceRepository $serviceRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'services' => $serviceRepository->findByEvent('Naissance'),
        ]);
    }

    #[Route('/soiree-privee', name: 'app_soiree_privee')]
    public function soireePrivee(ServiceRepository $serviceRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'services' => $serviceRepository->findByEvent('Soiree privee'),
        ]);
    }

    #[Route('/service/{id}', name: 'app_home_service_show', methods: ['GET'])]
    public function show(Service $service): Response
    {
        return $this->render('home/service/show.html.twig', [
            'service' => $service,
        ]);
    }

    #[Route('/service/{categorie}', name: 'app_home_service_categorie_show', methods: ['GET'])]
    #[ParamConverter('service', options: ['mapping' => ['categorie' => 'categorie']])]
    public function categorie_show(Service $service): Response
    {

        return $this->render('home/index.html.twig', [
            'service' => $service,
        ]);
    }

    #[Route('/service/{id}/demande', name: 'app_home_demande', methods: ['GET', 'POST'])]
    public function demande(Service $service, Request $request, EntityManagerInterface $manager, DemandesRepository $demandesRepository, DisponibiliteRepository $disponibiliteRepository): Response
    {
        $demandeEnAttente = $demandesRepository->findDemandeWithService($this->getUser()->getId(), $service->getId());

        if ($demandeEnAttente) {
            $this->addFlash('demandeAttente', 'Vous avez déjà une demande en attente pour ce service');

            return $this->render('home/service/show.html.twig', [
                'service' => $service,
            ]);
        }

        $demande = new Demandes();
        $form = $this->createForm(DemandesType::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $demande = $form->getData();

            $demande->setUser($this->getUser());
            $demande->setService($service);
            $demande->setStatut('en attente');

            $disponibilite = $disponibiliteRepository->findDateLibre($service->getId(), $form->get("planedDate")->getData());
            $disponibilite->setLibre(false);

            $manager->persist($demande);
            $manager->persist($disponibilite);
            $manager->flush();

            $userNom = $this->getUser()->getNom();
            $userPrenom = $this->getUser()->getPrenom();
            $serviceNom = $service->getNom();
            $serviceUserMail = $service->getUser()->getEmail();

            // Configure API key authorization: api-key
            $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', $_ENV['SENDINBLUE_API_KEY']);

            $apiInstance = new TransactionalEmailsApi(
                // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
                // This is optional, `GuzzleHttp\Client` will be used as default.
                new Client(['verify' => false]),
                $config
            );
            $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail(); // \SendinBlue\Client\Model\SendSmtpEmail | Values to send a transactional email
            $sendSmtpEmail['to'] = array(array('email' => $serviceUserMail));
            $sendSmtpEmail['sender'] =  array('name' => 'Event Presta', 'email' => 'noreply-event-presta@gmail.com');
            $sendSmtpEmail['htmlContent'] = 'L\'utilisateur ' . $userNom . ' ' . $userPrenom . ' a effectué une demande pour votre service ' . $serviceNom . '. Consultez votre profil.';
            $sendSmtpEmail['subject'] = 'Demande pour votre service';
            $sendSmtpEmail['params'] = array('name' => 'John', 'surname' => 'Doe');
            $sendSmtpEmail['headers'] = array('X-Mailin-custom' => 'custom_header_1:custom_value_1|custom_header_2:custom_value_2');

            try {
                $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
            } catch (Exception $e) {
                echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
            }

            $this->addFlash('confirmDemande', 'Le prestataire va être notifié de votre demande, vous allez recevoir une réponse de sa part');

            return $this->redirectToRoute('app_demandes_account_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('demandes/new.html.twig', [
            'form' => $form->createView(),
            'serviceDispos' => $disponibiliteRepository->findDispoById($service->getId()),
        ]);
    }
    // #[Route('/{me}', name: 'app_home')]
    // public function index(): Response
    // {
    //     return $this->render('home/index.html.twig', [
    //         'controller_name' => 'HomeController',
    //     ]);
    // }
}
