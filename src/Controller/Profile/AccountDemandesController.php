<?php

namespace App\Controller\Profile;

use App\Entity\Commande;
use App\Entity\Demandes;
use App\Form\DemandesType;
use App\Form\DemandesNewDateType;
use App\Repository\DemandesRepository;
use App\Repository\DisponibiliteRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/profil/demandes')]
class AccountDemandesController extends AbstractController
{
    #[Route('/', name: 'app_demandes_account_index', methods: ['GET'])]
    public function index(DemandesRepository $demandesRepository): Response
    {
        return $this->render('profile/demandes/index.html.twig', [
            'demandes' => $demandesRepository->findWithUser($this->getUser()->getId()),
        ]);
    }

    #[Route('/new', name: 'app_demandes_account_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $demande = new Demandes();
        $form = $this->createForm(DemandesType::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $demande = $form->getData();

            $manager->persist($demande);
            $manager->flush();

            return $this->redirectToRoute('app_demandes_account_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profile/demandes/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/{id}', name: 'app_demandes_account_show', methods: ['GET'])]
    public function show(Demandes $demande, DemandesRepository $demandesRepository): Response
    {
        $dm = $demandesRepository->findWithUserOnly($this->getUser()->getId(), $demande->getId());
        if (empty($dm)) {
            return $this->redirectToRoute('app_home', []);
        }

        return $this->render('profile/demandes/show.html.twig', [
            'demande' => $demande,
        ]);
    }

    #[Route('/{id}/conv', name: 'app_demandes_account_conv', methods: ['GET'])]
    public function conv(Demandes $demande): Response
    {
        #je recupère l'id de l'utilisateur connecté
        $this->getUser()->getId();
        #je recupère l'id de l'utilisateur qui a posté la demande
        #dd($demande->getId());
        #je redirige vers la page pour poster un nouveau message
        return $this->redirectToRoute('app_message_new', [
            'id_demande' => $demande->getId(),
            'id_destinataire' => $demande->getService()->getUser()->getId(),
         
        ]);
        
    }

    #[Route('/{id}/edit', name: 'app_demandes_account_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Demandes $demande, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(DemandesType::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $demande = $form->getData();

            $manager->persist($demande);
            $manager->flush();

            return $this->redirectToRoute('app_demandes_account_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profile/demandes/edit.html.twig', [
            'form' => $form->createView(),
            'demande' => $demande,
        ]);
        
    }

    #[Route('/{id}', name: 'app_demandes_account_delete', methods: ['POST'])]
    public function delete(Request $request, Demandes $demande, DemandesRepository $demandesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demande->getId(), $request->request->get('_token'))) {
            $demandesRepository->remove($demande, true);
        }

        return $this->redirectToRoute('app_demandes_account_index', [], Response::HTTP_SEE_OTHER);
    }

    /*#[Route('/{id}/nouvelle-date', name: 'app_demandes_account_new_date', methods: ['GET', 'POST'])]
    public function demandeNewDat(Request $request, Demandes $demande, EntityManagerInterface $manager): Response
    {
        return $this->render('profile/demandes/nouvelleDate.html.twig', [
            'demande' => $demande,
        ]);

        
    }*/


    #[Route('/{id}/paiement', name: 'app_demandes_account_paiement', methods: ['GET', 'POST'])]
    public function paiement(Demandes $demande, Request $request, EntityManagerInterface $manager): Response
    {
        return $this->render('profile/demandes/paiement.html.twig', [
            'demande' => $demande,
        ]);
    }

    #[Route('/{id}/paiement-confirm', name: 'app_demandes_account_confirm_paiement', methods: ['GET', 'POST'])]
    public function paiementConfirm(Demandes $demande, Request $request, EntityManagerInterface $manager): Response
    {
        $commande = new Commande();
        $commande->setPrixFinal($demande->getService()->getPrix());
        $commande->setDemande($demande);

        $demande->setPaiement(true);

        $manager->persist($commande);
        $manager->persist($demande);
        $manager->flush();

        return $this->redirectToRoute('app_demandes_account_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/paiement-cancel', name: 'app_demandes_account_cancel_paiement', methods: ['GET', 'POST'])]
    public function paiementCancel(Demandes $demande, Request $request, EntityManagerInterface $manager): Response
    {
        $demande->setStatut("annule");

        $manager->persist($demande);
        $manager->flush();
        
        return $this->redirectToRoute('app_demandes_account_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{id}/nouvelle-date', name: 'app_demande_account_new_date', methods: ['GET', 'POST'])]
    public function demandeNewDate(Demandes $demande, Request $request, EntityManagerInterface $manager, DisponibiliteRepository $disponibiliteRepository): Response
    {
        $form = $this->createForm(DemandesNewDateType::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $demande = $form->getData();

            $disponibilite = $disponibiliteRepository->findDateLibre($demande->getService()->getId(), $demande->getPlanedDate());
            $disponibilite->setLibre(true);

            $disponibilite2 = $disponibiliteRepository->findDateLibre($demande->getService()->getId(), $form->get("newPlanedDate")->getData());
            $disponibilite2->setLibre(false);

            $manager->persist($demande);
            $manager->persist($disponibilite);
            $manager->persist($disponibilite2);
            $manager->flush();

            return $this->redirectToRoute('app_demandes_account_index', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->render('profile/demandes/nouvelleDate.html.twig', [
            'form' => $form,
            'demande' => $demande,
            'serviceDispos' => $disponibiliteRepository->findDispoById($demande->getService()->getId()),
        ]);
    }

    #[Route('/{id}/add-note', name: 'app_demande_account_add_note', methods: ['GET', 'POST'])]
    public function addNote(Demandes $demande, Request $request, EntityManagerInterface $manager): Response
    {
        $note = (floatval($request->request->get('note')));

        $demande->setNote($note);
        $manager->persist($demande);
        $manager->flush();

        $service = $demande->getService();

        $noteServ = $service->getNoteMoy();
        if ($noteServ == null) {
            $service->setNoteMoy($note);
            $manager->persist($service);
            $manager->flush();
        }else {
            $noteMoyenne = ($note +$noteServ)/2;
            $service->setNoteMoy($noteMoyenne);
            $manager->persist($service);
            $manager->flush();
        }
        
        return $this->redirectToRoute('app_demandes_account_index', [], Response::HTTP_SEE_OTHER);
    }

    
}
