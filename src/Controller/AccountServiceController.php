<?php

namespace App\Controller;

use Exception;
use App\Entity\User;
use GuzzleHttp\Client;
use App\Entity\Service;
use App\Entity\Demandes;
use App\Form\ServiceType;
use App\Entity\AccreditationPro;
use SendinBlue\Client\Configuration;
use App\Repository\ServiceRepository;
use SendinBlue\Client\Api\AccountApi;
use App\Repository\DemandesRepository;
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

    #[Route('/{id}', name: 'app_service_account_delete', methods: ['POST'])]
    public function delete(Request $request, Service $service, ServiceRepository $serviceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$service->getId(), $request->request->get('_token'))) {
            $serviceRepository->remove($service, true);
        }

        return $this->redirectToRoute('app_service_account_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/send-email-pro', name: 'app_send_email_pro')]
    public function sendEmailPro(Request $request, User $user,  EntityManagerInterface $manager): Response
    {
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
        $sendSmtpEmail['to'] = array(array('email'=>'jerrinald95190@live.fr'));
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