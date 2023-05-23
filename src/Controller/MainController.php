<?php

namespace App\Controller;

use App\Repository\DisponibiliteRepository;
use App\Repository\EvenementRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('event/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/', name: 'app_search_info')]
    public function search_info(ServiceRepository $serviceRepository, EvenementRepository $evenementRepository, Request $request, DisponibiliteRepository $disponibiliteRepository): Response
    {
        return $this->render('home/index.html.twig', [
            /* 'form' => $form->createView(), */
            'services' => $serviceRepository->findAll(),
            'evenements' => $evenementRepository->findAll(),
            'disponibilites' => $disponibiliteRepository->findFirstDispo(),
        ]);
    }
}
