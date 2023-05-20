<?php

namespace App\Controller\Security;

use Exception;
use App\Entity\User;
use GuzzleHttp\Client;
use App\Security\EmailVerifier;
use App\Form\RegistrationFormType;
use Sendinblue\Client\Api\SMTPApi;
use Symfony\Component\Mime\Address;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Api\AccountApi;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
//use App\Service\EmailSender;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;

class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;
    //private $emailSender;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
        //$this->emailSender = $emailSender;
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, VerifyEmailHelperInterface $verifyEmailHelper): Response
    {

        $user = new User();
        
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $user->setRoles(array('ROLE_USER'));

            $entityManager->persist($user);
            $entityManager->flush();

            // generate a signed url and email it to the user
            /*$this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('k.jerrinald@gmail.com', 'Evenementiel Prestations'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );*/
            // do anything else you need here, like send an email

            /*$to = $user->getEmail();
            $subject = 'Please Confirm your Email';
            $htmlContent = $this->renderView('registration/confirmation_email.html.twig');

            $this->emailSender->sendEmail($to, $subject, $htmlContent);*/

            // Configure API key authorization: api-key
            $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', $_ENV['SENDINBLUE_API_KEY']);
            // Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
            // $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('api-key', 'Bearer');
            // Configure API key authorization: partner-key
            //$config = Configuration::getDefaultConfiguration()->setApiKey('partner-key', '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');
            // Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
            // $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('partner-key', 'Bearer');

            $signatureComponents = $verifyEmailHelper->generateSignature(
                'app_verify_email',
                $user->getId(),
                $user->getEmail(),
                ['id' => $user->getId()]
            );

            $apiInstance = new TransactionalEmailsApi(
                // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
                // This is optional, `GuzzleHttp\Client` will be used as default.
                new Client(['verify' => false]),
                $config
            );
            $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail(); // \SendinBlue\Client\Model\SendSmtpEmail | Values to send a transactional email
            $sendSmtpEmail['to'] = array(array('email'=>$user->getEmail()));
            $sendSmtpEmail['sender'] =  array('name' => 'Event Presta', 'email' => 'noreply-event-presta@gmail.com');
            $sendSmtpEmail['htmlContent'] = $this->renderView('registration/confirmation_email.html.twig') . '<a href=' . $signatureComponents->getSignedUrl() . '>Confirm my Email</a>';
            $sendSmtpEmail['subject'] = 'Please Confirm your Email';
            $sendSmtpEmail['params'] = array('name'=>'John', 'surname'=>'Doe');
            $sendSmtpEmail['headers'] = array('X-Mailin-custom'=>'custom_header_1:custom_value_1|custom_header_2:custom_value_2');

            try {
                $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
            } catch (Exception $e) {
                echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
            }

            $this->addFlash('verifyEmail', 'Un email vous a été envoyé, cliquez sur le lien puis connectez-vous pour valider votre compte');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_register');
        }

        $this->addFlash('success', 'Votre adresse email a été vérifié.');

        return $this->redirectToRoute('app_home');
    }
}
