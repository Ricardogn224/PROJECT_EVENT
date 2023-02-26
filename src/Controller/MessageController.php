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
        $user = $this->getUser();
        #dd($user->id);
        $demandes = $demandesRepository->findAll();
        #dd($demandes);

        $messages = [];
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

        

        #dd($messages);

        #dd($messages);

        /* return $this->render('message/index.html.twig', [
            'messages' => $messageRepository->findAll(),
        ]); */

        return $this->render('message/index.html.twig', [
            'messages' => $messages,
        ]);
    }

    #[Route('/new', name: 'app_message_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MessageRepository $messageRepository): Response
    {
        $message = new Message();
        $form = $this->createForm(Message1Type::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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
