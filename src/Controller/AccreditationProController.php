<?php

namespace App\Controller;

use Exception;
use App\Entity\User;
use GuzzleHttp\Client;
use App\Entity\AccreditationPro;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\AccreditationProRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use SendinBlue\Client\Configuration;

#[Route('/admin')]
class AccreditationProController extends AbstractController
{
    #[Route('/accreditation-index', name: 'app_accreditation_index')]
    public function index(AccreditationProRepository $accreditationProRepository): Response
    {
        return $this->render('accreditation_pro/index.html.twig', [
            'accred_pros' => $accreditationProRepository->findDemandes(),
        ]);
    }

    #[Route('/{id}/accredidation-accept', name: 'app_accreditation_accept')]
    public function accredidationAccept(Request $request, User $user, AccreditationPro $accredPro, EntityManagerInterface $manager): Response
    {
        $accredPro->setEnAttente(true);
        $accredPro->setEstAccepte(true);
        
        $user = $accredPro->getUser();
        $mailUser = $user->getEmail();

        $user->setRoles(array('ROLE_PRO'));

        $manager->persist($accredPro);
        $manager->persist($user);
        $manager->flush();


        // Configure API key authorization: api-key
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

        $apiInstance = new TransactionalEmailsApi(
            // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
            // This is optional, `GuzzleHttp\Client` will be used as default.
            new Client(['verify' => false]),
            $config
        );
        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail(); // \SendinBlue\Client\Model\SendSmtpEmail | Values to send a transactional email
        $sendSmtpEmail['to'] = array(array('email'=>$mailUser));
        $sendSmtpEmail['sender'] =  array('name' => 'Event Presta', 'email' => 'noreply-event-presta@gmail.com');
        $sendSmtpEmail['htmlContent'] = 'Votre demande de prestations de services a été accepté, vous pouvez dès-à-présent proposer un nouveau service';
        $sendSmtpEmail['subject'] = 'Demande de prestations de service accepté';
        $sendSmtpEmail['params'] = array('name'=>'John', 'surname'=>'Doe');
        $sendSmtpEmail['headers'] = array('X-Mailin-custom'=>'custom_header_1:custom_value_1|custom_header_2:custom_value_2');

        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
        } catch (Exception $e) {
            echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
        }

        return $this->redirectToRoute('app_accreditation_index');
    }

    #[Route('/{id}/accredidation-refuse', name: 'app_accreditation_refuse')]
    public function accredidationRefuse(Request $request, User $user, AccreditationPro $accredPro, EntityManagerInterface $manager): Response
    {
        $accredPro->setEnAttente(true);
        $accredPro->setEstAccepte(false);

        $user = $accredPro->getUser();
        $mailUser = $user->getEmail();

        $manager->persist($accredPro);
        $manager->flush();


        // Configure API key authorization: api-key
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

        $apiInstance = new TransactionalEmailsApi(
            // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
            // This is optional, `GuzzleHttp\Client` will be used as default.
            new Client(['verify' => false]),
            $config
        );
        $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail(); // \SendinBlue\Client\Model\SendSmtpEmail | Values to send a transactional email
        $sendSmtpEmail['to'] = array(array('email'=>$mailUser));
        $sendSmtpEmail['sender'] =  array('name' => 'Event Presta', 'email' => 'noreply-event-presta@gmail.com');
        $sendSmtpEmail['htmlContent'] = 'Votre demande de prestations de services a été malheureusement refusé';
        $sendSmtpEmail['subject'] = 'Demande de prestations de service refusé';
        $sendSmtpEmail['params'] = array('name'=>'John', 'surname'=>'Doe');
        $sendSmtpEmail['headers'] = array('X-Mailin-custom'=>'custom_header_1:custom_value_1|custom_header_2:custom_value_2');

        try {
            $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
        } catch (Exception $e) {
            echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
        }

        return $this->redirectToRoute('app_accreditation_index');
    }
}
