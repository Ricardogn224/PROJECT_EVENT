<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\Message1Type;
use App\Form\ReplyType;
use App\Repository\MessageRepository;
use App\Repository\DemandesRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/message')]
class MessageController extends AbstractController
{
    #[Route('/', name: 'app_message_index', methods: ['GET'])]
    public function index(MessageRepository $messageRepository, DemandesRepository $demandesRepository, UserRepository $userRepository): Response
    {
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
                if($message->id_emmeteur == $this->getUser()->getId() ){
                    $message-> emmeteur = $userRepository -> findUserById($message->id_emmeteur)-> getNom();
                    $message-> recepteur = $userRepository -> findUserById($message->id_destinataire)-> getNom();
                    $demande = $demandesRepository->findDemandeById($message->id_demande);
                    $message-> demande = $demande -> getService()->getNom();
                }
            }
        }else {
            $messages= [];
        }
        #dd($messages);
            
        
                #$message[$x]-> demande = $demande->getId();
            
            
            #dd($message[0]);
            #$messages[] = $message;
        
        

        return $this->render('message/index.html.twig', [
            'messages' => $messages,
        ]);

        /* $user = $this->getUser();
        #dd($user->id);
        $demandes = $demandesRepository->findAll();
        #dd($demandes);

        $messages = [];
        if(count($messages) != 0) {
            foreach($demandes as $demande){

                $messages[] = $messageRepository->findById2mande($demande->getId());
                ##dd($demande->getId());
                #dd($messages);
                foreach($messages as $message) {
                    ##dd($message);
                    for ($x = 0; $x <= count($message) -1; $x++) {
                        $message[$x]-> emmeteur = $userRepository -> findUserById($message[$x]->id_emmeteur)-> getNom();
                        $message[$x]-> recepteur = $userRepository -> findUserById($message[$x]->id_destinataire)-> getNom();
                        $message[$x]-> demande = $demande -> getService();
                        #$message[$x]-> demande = $demande->getId();
                    }
                    
                    #dd($message[0]);
                    #$messages[] = $message;
                }
            }
        } */

        

        #dd($messages);

        #dd($messages);

        /* return $this->render('message/index.html.twig', [
            'messages' => $messageRepository->findAll(),
        ]); */

    }
    

    #[Route('/new', name: 'app_message_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MessageRepository $messageRepository): Response
    {
        $message = new Message();

        #dd($request);
        $id_emmeteur = $message->id_emmeteur = $this->getUser()->getId();
        $id_destinataire = $message->id_destinataire = $request->query->get('id_destinataire');
        $id_demande = $message->id_demande = $request->query->get('id_demande');

        $form = $this->createForm(Message1Type::class, $message);
        $form->handleRequest($request);
        #dd($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message->id_emmeteur = $id_emmeteur;
            $message->id_destinataire = $id_destinataire;
            $message->id_demande = $id_demande;
            $messageRepository->save($message, true);

            return $this->redirectToRoute('app_message_index', [], Response::HTTP_SEE_OTHER);
        }

        

        return $this->renderForm('message/new.html.twig', [
            'message' => $message,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_message_show', methods: ['GET'])]
    public function show(Message $message, UserRepository $userRepository,DemandesRepository $demandesRepository): Response
    {   
           
        
            $message->emmeteur = $userRepository -> findUserById($message->id_emmeteur)-> getNom();
            $message->recepteur = $userRepository -> findUserById($message->id_destinataire)-> getNom();
            #$message->demande = $demande -> getService();
            $message->demande = "getDemandeById()";
        
        
        return $this->render('message/show.html.twig', [
            'message' => $message,
        ]);
    }

    #[Route('/reply/{id}', name: 'app_message_reply', methods: ['GET','POST'])]
    public function reply(Request $request,Message $message,MessageRepository $messageRepository): Response
    {
        $user = $this->getUser();
        #dd($user->id);

        #dd($message->id_emmeteur);
        $reply = new Message();
        #dd($reply);
        
        if ( $message->id_destinataire == $user->id)
        {
            $reply->id_emmeteur = $message->id_emmeteur;
            $reply->id_destinataire = $message->id_destinataire;
            $reply->id_demande = $message->id_demande;
        }else {
            $reply->id_destinataire = $message->id_emmeteur;
            $reply->id_emmeteur = $message->id_destinataire;
            $reply->id_demande = $message->id_demande;
        }
        
        
        $form = $this->createForm(ReplyType::class, $reply);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $messageRepository->save($reply, true);

            return $this->redirectToRoute('app_message_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('message/new.html.twig', [
            'message' => $reply,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_message_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Message $message, MessageRepository $messageRepository): Response
    {
        $form = $this->createForm(Message1Type::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $messageRepository->save($message, true);

            return $this->redirectToRoute('app_message_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('message/edit.html.twig', [
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
}
