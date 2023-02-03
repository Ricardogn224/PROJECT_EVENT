<?php

namespace App\Controller;

use App\Entity\Demandes;
use App\Form\DemandesType;
use App\Repository\DemandesRepository;
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
        return $this->render('demandes/index.html.twig', [
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

        return $this->render('demandes/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/{id}', name: 'app_demandes_account_show', methods: ['GET'])]
    public function show(Demandes $demande): Response
    {
        return $this->render('demandes/show.html.twig', [
            'demande' => $demande,
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

        return $this->render('demandes/edit.html.twig', [
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
}
