<?php

namespace App\Controller\Profile;

use Exception;
use App\Entity\User;
use GuzzleHttp\Client;
use App\Entity\Service;
use App\Entity\Demandes;
use App\Form\ServiceType;
use App\Entity\AccreditationPro;
use App\Form\DemandesNewDateType;
use SendinBlue\Client\Configuration;
use App\Repository\ServiceRepository;
use SendinBlue\Client\Api\AccountApi;
use App\Repository\DemandesRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/profil/service')]
class AccountServiceController extends AbstractController
{

    #[Route('/', name: 'app_service_account_index', methods: ['GET'])]
    public function index(ServiceRepository $serviceRepository): Response
    {
        $pro = false;
        if ($this->isGranted('ROLE_PRO') || $this->isGranted('ROLE_ADMIN')) {
            $pro = true;
        }

        return $this->render('profile/service/index.html.twig', [
            'pro' => $pro,
        ]);
    }

    #[Route('/mes-services', name: 'app_service_account_index_myServices', methods: ['GET'])]
    public function indexMyServices(ServiceRepository $serviceRepository): Response
    {
        return $this->render('profile/service/indexMyServices.html.twig', [
            'services' => $serviceRepository->findWithUser($this->getUser()->getId()),
            'user' => $this->getUser(),
        ]);
    }

    #[Route('/demandes-pour-mes-services', name: 'app_service_account_index_proposition', methods: ['GET'])]
    public function indexProposition(DemandesRepository $demandeRepository): Response
    {

        return $this->render('profile/service/indexProposition.html.twig', [
            'demandes' => $demandeRepository->findDemandeProposition($this->getUser()->getId()),
        ]);
    }

    #[Route('/demandes-pour-mes-services/{id}', name: 'app_service_account_show_proposition', methods: ['GET', 'POST'])]
    public function showProposition(Demandes $demande): Response
    {

        return $this->render('profile/service/showProposition.html.twig', [
            'demande' => $demande
        ]);
    }

    #[Route('/demandes-pour-mes-services/{id}/nouvelle-date', name: 'app_service_account_new_date', methods: ['GET', 'POST'])]
    public function serviceNewDate(Demandes $demande, Request $request, EntityManagerInterface $manager): Response
    {

        $demande->setPropositionNouvelleDate(true);
        $manager->persist($demande);
        $manager->flush();

        return $this->redirectToRoute('app_service_account_index_proposition', [], Response::HTTP_SEE_OTHER);
        /*$form = $this->createForm(DemandesNewDateType::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $demande = $form->getData();

            $manager->persist($demande);
            $manager->flush();

            return $this->redirectToRoute('app_service_account_index_proposition', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->render('profile/service/nouvelleDate.html.twig', [
            'form' => $form
        ]);*/
    }

    #[Route('/demandes-pour-mes-services/{id}/nouvelle-date-confirm', name: 'app_service_account_new_date_confirm', methods: ['GET', 'POST'])]
    public function serviceNewDateConfirm(Demandes $demande, Request $request, EntityManagerInterface $manager): Response
    {
        return $this->render('profile/service/nouvelleDate.html.twig', [
            'demande' => $demande
        ]);
    }

    

    #[Route('/demandes-pour-mes-services/{id}/accept-demande', name: 'app_service_account_accept_new_date', methods: ['GET', 'POST'])]
    public function serviceDemandeAccept(Demandes $demande, Request $request, EntityManagerInterface $manager): Response
    {
        $demande->setStatut("accepte");
        $manager->persist($demande);
        $manager->flush();
        return $this->redirectToRoute('app_service_account_index_proposition', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/demandes-pour-mes-services/{id}/refuse-demande', name: 'app_service_account_refuse_new_date', methods: ['GET', 'POST'])]
    public function serviceDemandeRefuse(Demandes $demande, Request $request, EntityManagerInterface $manager): Response
    {
        $demande->setStatut("refuse");
        $manager->persist($demande);
        $manager->flush();
        return $this->redirectToRoute('app_service_account_index_proposition', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/new', name: 'app_service_account_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $service = new Service();
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $service = $form->getData();
            $service->setUser($this->getUser());

            $manager->persist($service);
            $manager->flush();

            return $this->redirectToRoute('app_service_account_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profile/service/new.html.twig', [
            'form' => $form->createView()
        ]);

    }

    #[Route('/{id}', name: 'app_service_account_show', methods: ['GET'])]
    public function show(Service $service): Response
    {
        return $this->render('profile/service/show.html.twig', [
            'service' => $service,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_service_account_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Service $service, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $service = $form->getData();

            $manager->persist($service);
            $manager->flush();


            return $this->redirectToRoute('app_service_account_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profile/service/edit.html.twig', [
            'form' => $form->createView(),
            'service' => $service,
        ]);

    }

    #[Route('/{id}/avertir-note', name: 'app_service_avertir_note', methods: ['GET', 'POST'])]
    public function avertirNote(Request $request, Demandes $demande, EntityManagerInterface $manager): Response
    {
        $demande->setServiceTermine(true);

        $manager->persist($demande);
        $manager->flush();

        return $this->render('profile/service/showProposition.html.twig', [
            'demande' => $demande
        ]);

    }

    #[Route('/{id}', name: 'app_service_account_delete', methods: ['POST'])]
    public function delete(Request $request, Service $service, ServiceRepository $serviceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$service->getId(), $request->request->get('_token'))) {
            $serviceRepository->remove($service, true);
        }

        return $this->redirectToRoute('app_service_account_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/send-email-pro', name: 'app_send_email_pro')]
    public function sendEmailPro(Request $request, User $user,  EntityManagerInterface $manager, UserRepository $userRepository): Response
    {
        $adminEmail = "";
        $breakLoop = false;
        $userEm = $userRepository->findAll();
        foreach($userEm as $key =>$userItem) {
            if (!$breakLoop) {
                $usRole = $userItem->getRoles()[0];
                if ($usRole ===  "ROLE_ADMIN") {
                    $adminEmail = $userItem->getEmail();
                    $breakLoop = true;
                }
            }
        }

        if ($adminEmail === "") {
            $adminEmail = 'jerrinald95190@live.fr';
        }

        $accred_pro = new AccreditationPro();
        $accred_pro->setEnAttente(true);
        $accred_pro->setEstAccepte(false);
        $accred_pro->setUser($this->getUser());

        $manager->persist($accred_pro);
        $manager->flush();


        // Configure API key authorization: api-key
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', $_ENV['SENDINBLUE_API_KEY']);

        $apiInstance = new TransactionalEmailsApi(
            // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
            // This is optional, `GuzzleHttp\Client` will be used as default.
            new Client(['verify' => false]),
            $config
        );
        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail(); // \SendinBlue\Client\Model\SendSmtpEmail | Values to send a transactional email
        $sendSmtpEmail['to'] = array(array('email'=>$adminEmail));
        $sendSmtpEmail['sender'] =  array('name' => 'Event Presta', 'email' => 'noreply-event-presta@gmail.com');
        $sendSmtpEmail['htmlContent'] = 'L\'utilisateur ' . $user->getNom() . ' ' . $user->getPrenom() . ' souhaite proposer ses services. Confirmez sur l\'interface administrateur.';
        $sendSmtpEmail['subject'] = 'Demande pour prestation de services';
        $sendSmtpEmail['params'] = array('name'=>'John', 'surname'=>'Doe');
        $sendSmtpEmail['headers'] = array('X-Mailin-custom'=>'custom_header_1:custom_value_1|custom_header_2:custom_value_2');

        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
        } catch (Exception $e) {
            echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
        }

        $this->addFlash('confirmEmailPro', 'L\'administrateur va être notifié de votre requête, vous allez recevoir une réponse de sa part');
        return $this->redirectToRoute('app_service_account_index');
    }
}
