<?php

namespace App\Controller;

use App\Entity\Demandes;
use App\Form\DemandesType;
use App\Repository\DemandesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/demandes')]
class DemandesController extends AbstractController
{
    #[Route('/', name: 'app_demandes_index', methods: ['GET'])]
    public function index(DemandesRepository $demandesRepository): Response
    {
        return $this->render('demandes/index.html.twig', [
            'demandes' => $demandesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_demandes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DemandesRepository $demandesRepository): Response
    {
        $demande = new Demandes();
        $form = $this->createForm(DemandesType::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $demandesRepository->save($demande, true);

            return $this->redirectToRoute('app_demandes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demandes/new.html.twig', [
            'demande' => $demande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_demandes_show', methods: ['GET'])]
    public function show(Demandes $demande): Response
    {
        return $this->render('demandes/show.html.twig', [
            'demande' => $demande,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_demandes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Demandes $demande, DemandesRepository $demandesRepository): Response
    {
        $form = $this->createForm(DemandesType::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $demandesRepository->save($demande, true);

            return $this->redirectToRoute('app_demandes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('demandes/edit.html.twig', [
            'demande' => $demande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_demandes_delete', methods: ['POST'])]
    public function delete(Request $request, Demandes $demande, DemandesRepository $demandesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demande->getId(), $request->request->get('_token'))) {
            $demandesRepository->remove($demande, true);
        }

        return $this->redirectToRoute('app_demandes_index', [], Response::HTTP_SEE_OTHER);
    }
}
