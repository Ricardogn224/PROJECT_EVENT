<?php

namespace App\Controller;

use Exception;
use App\Entity\Message;
use App\Form\Message2Type;
use App\Repository\DemandesRepository;
use App\Repository\EvenementRepository;
use App\Repository\MessageRepository;
use GuzzleHttp\Client;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use SendinBlue\Client\Configuration;
use App\Repository\ServiceRepository;
use SendinBlue\Client\Api\AccountApi;
use SendinBlue\Client\Api\TransactionalEmailsApi;

#[Route('/message')]
class MessageController extends AbstractController
{
    #[Route('/', name: 'app_message_index', methods: ['GET'])]
    public function index(MessageRepository $messageRepository, UserRepository $userRepository, DemandesRepository $demandesRepository, EvenementRepository $evenementRepository): Response
    {
        $user = $this->getUser();
        #je recupère l'id de l'utilisateur connecté
        $this->getUser()->getId();
        # je recupère les message envoyé par l'utilisateur connecté
        $messages1 = $messageRepository->findByIdEmmeteur($this->getUser()->getId());
        # je recupère les message reçu à l'utilisateur connecté
        $messages2 = $messageRepository->findByIdDestinataire($this->getUser()->getId());
        # je fusionne les deux tableaux
        $messages = array_merge($messages1, $messages2);

        #dd($messages);


        if($messages != null){
            foreach($messages as $message) {
                #dd($message);
                
                if($message->id_emmeteur == $this->getUser()->getId()  or $message->id_destinataire == $this->getUser()->getId()){
                    $message-> emmeteur = $userRepository -> findUserById($message->id_emmeteur)-> getNom();
                    $message-> recepteur = $userRepository -> findUserById($message->id_destinataire)->getNom();
                    if ($message-> emmeteur === $this->getUser()->getNom()) {
                        $message-> emmeteur = "Moi";
                    }else if ($message-> recepteur === $this->getUser()->getNom()) {
                        $message-> recepteur = "Moi";
                    }
                    $demande = $demandesRepository->findDemandeById($message->id_demande);
                    $message-> demande = $demande -> getService() -> getNom();

                    
                }
            }
        }else {
            $messages= [];
        }

       
        return $this->render('message/index.html.twig', [
            'evenements' => $evenementRepository->findAll(),
            'messages' => $messages,
        ]);
    }

    #[Route('/new', name: 'app_message_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MessageRepository $messageRepository, UserRepository $userRepository, EvenementRepository $evenementRepository): Response
    {
        $id_demande = $request->query->get('id_demande');
        $destinataire = $request->query->get('id_destinataire');

        $message = new Message();

        $message->setMessage('Bonjour, je souhaiterais vous contacter pour votre annonce');
        $message->setIdDestinataire($destinataire);
        $message->setIdEmmeteur($this->getUser()->getId());
        $message->setIdDemande($id_demande);

          #controle de l'id emmeteur et destinataire
          if ($message->getIdDestinataire() == $this->getUser()->getId()) {
            #afficher un message 'vous ne pouvez pas vous envoyer de meassage à vous même'
            #dd('vous ne pouvez pas vous envoyer de meassage à vous même');
            $this->addFlash('messageError','vous ne pouvez pas vous envoyer de meassage à vous même');
            #faire une redirection vers la page de l'annonce

            return $this->redirectToRoute('app_message_index', [], Response::HTTP_SEE_OTHER);
        }


        $form = $this->createForm(Message2Type::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $messageRepository->save($message, true);

            $destinataire = $userRepository -> findUserById($destinataire);
            #envoi d'un mail pour lui notifier d u message
            // Configure API key authorization: api-key
            $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', $_ENV['SENDINBLUE_API_KEY']);

            
            $LinkToMessage = 'http://127.0.0.1:8000/message/'. $message->getId();

            $apiInstance = new TransactionalEmailsApi(
                // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
                // This is optional, `GuzzleHttp\Client` will be used as default.
                new Client(['verify' => false]),
                $config
            );
            $sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail(); // \SendinBlue\Client\Model\SendSmtpEmail | Values to send a transactional email
            $sendSmtpEmail['to'] = array(array('email'=> $destinataire->getEmail()));
            $sendSmtpEmail['sender'] =  array('name' => 'Event Presta', 'email' => 'noreply-event-presta@gmail.com');
            $sendSmtpEmail['htmlContent'] = 'L\'utilisateur ' . $this->getUser()->getNom() . ' ' . $this->getUser()->getPrenom() . ' vous a envoyé un message. Allez le consulter sur Presta Event ' . '<a href=' . $LinkToMessage . '>Cliquez ici</a>';
            $sendSmtpEmail['subject'] = 'Message sur Presta Event';
            $sendSmtpEmail['params'] = array('name'=>'John', 'surname'=>'Doe');
            $sendSmtpEmail['headers'] = array('X-Mailin-custom'=>'custom_header_1:custom_value_1|custom_header_2:custom_value_2');

            try {
                $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
            } catch (Exception $e) {
                echo 'Exception when calling TransactionalEmailsApi->sendTransacEmail: ', $e->getMessage(), PHP_EOL;
            }

            return $this->redirectToRoute('app_message_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('message/new.html.twig', [
            'evenements' => $evenementRepository->findAll(),
            'message' => $message,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_message_show', methods: ['GET'])]
    public function show(Message $message, UserRepository $userRepository, DemandesRepository $demandesRepository, EvenementRepository $evenementRepository): Response
    {
        if ($message->id_emmeteur == $this->getUser()->getId() or $message->id_destinataire== $this->getUser()->getId()) {

            # on rajoute le nom de la demande, emmeteur, destinataire
            $message-> emmeteur = $userRepository -> findUserById($message->id_emmeteur)-> getNom();
            $message-> recepteur = $userRepository -> findUserById($message->id_destinataire)->getNom();
            if ($message-> emmeteur === $this->getUser()->getNom()) {
                $message-> emmeteur = "Moi";
            }else if ($message-> recepteur === $this->getUser()->getNom()) {
                $message-> recepteur = "Moi";
            }
            $demande = $demandesRepository->findDemandeById($message->id_demande);
            $message-> demande = $demande -> getService() -> getNom();

            return $this->render('message/show.html.twig', [
                'evenements' => $evenementRepository->findAll(),
                'message' => $message,
            ]);
        }else {
            return $this->redirectToRoute('app_message_index', [], Response::HTTP_SEE_OTHER);
        }
       
    }

    #[Route('/{id}/edit', name: 'app_message_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Message $message, MessageRepository $messageRepository, EvenementRepository $evenementRepository): Response
    {
        $form = $this->createForm(Message2Type::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $messageRepository->save($message, true);

            return $this->redirectToRoute('app_message_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('message/edit.html.twig', [
            'evenements' => $evenementRepository->findAll(),
            'message' => $message,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_message_delete', methods: ['POST'])]
    public function delete(Request $request, Message $message, MessageRepository $messageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$message->getId(), $request->request->get('_token'))) {
            $messageRepository->remove($message, true);
        }

        return $this->redirectToRoute('app_message_index', [], Response::HTTP_SEE_OTHER);
    }

    # route for reply message 
    #[Route('/reply/{id}', name: 'app_message_reply', methods: ['GET', 'POST'])]
    public function reply(Request $request, Message $message, MessageRepository $messageRepository, EvenementRepository $evenementRepository): Response
    {

        $reply = new Message();
        $reply->setIdDestinataire($message->getIdEmmeteur());
        $reply->setIdEmmeteur($this->getUser()->getId());
        $reply->setIdDemande($message->getIdDemande());
        $reply->setMessage('Bonjour, ');

        #if user is the destinataire of the message
        $form = $this->createForm(Message2Type::class, $reply);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $messageRepository->save($reply, true);
            return $this->redirectToRoute('app_message_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('message/new.html.twig', [
            'evenements' => $evenementRepository->findAll(),
            'message' => $reply,
            'form' => $form,
        ]);
    }
}
