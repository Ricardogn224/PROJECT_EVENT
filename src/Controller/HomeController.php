<?php

namespace App\Controller;

use App\Entity\Service;
use App\Entity\Demandes;
use App\Form\DemandesType;

use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ServiceRepository $serviceRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'services' => $serviceRepository->findAll(),
        ]);
    }

    #[Route('/service/{id}', name: 'app_home_service_show', methods: ['GET'])]
    public function show(Service $service): Response
    {
        return $this->render('home/service/show.html.twig', [
            'service' => $service,
        ]);
    }

    #[Route('/service/{id}/demande', name: 'app_home_demande', methods: ['GET', 'POST'])]
    public function demande(Service $service, Request $request, EntityManagerInterface $manager): Response
    {
        if ($this->getUser() == null) {
            return $this->redirectToRoute('app_login');
        }else{
            $demande = new Demandes();
            $form = $this->createForm(DemandesType::class, $demande);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                $demande = $form->getData();

                $demande->setUser($this->getUser());
                $demande->setService($service);
                $demande->setStatut('en attente');
    
                $manager->persist($demande);
                $manager->flush();
    
                return $this->redirectToRoute('app_demandes_account_index', [], Response::HTTP_SEE_OTHER);
            }
    
            return $this->render('demandes/new.html.twig', [
                'form' => $form->createView()
            ]);
        }
    }
    // #[Route('/{me}', name: 'app_home')]
    // public function index(): Response
    // {
    //     return $this->render('home/index.html.twig', [
    //         'controller_name' => 'HomeController',
    //     ]);
    // }
}
