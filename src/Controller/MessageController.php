<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use App\Repository\MessageRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/message')]
class MessageController extends AbstractController
{
    #[Route('/', name: 'app_message_index', methods: ['GET'])]
    public function index(MessageRepository $messageRepository): Response
    {
        return $this->render('message/index.html.twig', [
            'messages' => $messageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_message_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MessageRepository $messageRepository): Response
    {

        #acces to destinaire in query 
        $id_demande = $request->query->get('id_demande');
        $destinataire = $request->query->get('id_destinataire');
        #dd($destinataire);

        $message = new Message();
        $message->setMessage('Bonjour, je souhaiterais vous contacter pour votre annonce');
        $message->setIdDestinataire($destinataire);
        $message->setIdEmmeteur($this->getUser()->getId());
        $message->setIdDemande($destinataire);

        #controle de l'id emmeteur et destinataire
        if ($message->getIdDestinataire() == $this->getUser()->getId()) {
            #afficher un message 'vous ne pouvez pas vous envoyer de meassage à vous même'
            #dd('vous ne pouvez pas vous envoyer de meassage à vous même');
            #faire une redirection vers la page de l'annonce
            #return $this->redirectToRoute('app_message_index', [], Response::HTTP_SEE_OTHER);
        }

        $form = $this->createForm(MessageType::class, $message);
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
    public function show(Message $message): Response
    {
        return $this->render('message/show.html.twig', [
            'message' => $message,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_message_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Message $message, MessageRepository $messageRepository): Response
    {
        $form = $this->createForm(MessageType::class, $message);
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

    # route for reply message 
    #[Route('/reply/{id}', name: 'app_message_reply', methods: ['GET', 'POST'])]
    public function reply(Request $request, Message $message, MessageRepository $messageRepository): Response
    {
        $message->setIdDestinataire($message->getIdEmmeteur());
        $message->setIdEmmeteur($this->getUser()->getId());
        $message->setIdDemande($message->getIdDemande());
        $message->setMessage('Bonjour, ');

        $reply = new Message();
        $reply->setIdDestinataire($message->getIdEmmeteur());
        $reply->setIdEmmeteur($this->getUser()->getId());
        $reply->setIdDemande($message->getIdDemande());
        $reply->setMessage('Bonjour, ');

        #if user is the destinataire of the message
        $form = $this->createForm(MessageType::class, $reply);
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

    #[Route('/{id}', name: 'app_message_delete', methods: ['POST'])]
    public function delete(Request $request, Message $message, MessageRepository $messageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $message->getId(), $request->request->get('_token'))) {
            $messageRepository->remove($message, true);
        }

        return $this->redirectToRoute('app_message_index', [], Response::HTTP_SEE_OTHER);
    }
}
