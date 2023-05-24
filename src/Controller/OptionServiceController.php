<?php

namespace App\Controller;

use App\Entity\OptionService;
use App\Form\OptionsServiceType;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/option-service')]
class OptionServiceController extends AbstractController
{
    #[Route('/', name: 'app_option_service_index')]
    public function index( EvenementRepository $evenementRepository): Response
    {
        return $this->render('option_service/index.html.twig', [
            'evenements' => $evenementRepository->findAll(),
            'controller_name' => 'OptionServiceController',
        ]);
    }

    #[Route('/new', name: 'app_option_service_new')]
    public function new(Request $request, EntityManagerInterface $manager,  EvenementRepository $evenementRepository): Response
    {
        $optionService = new OptionService();
        $form = $this->createForm(OptionsServiceType::class, $optionService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $optionService = $form->getData();

            $manager->persist($optionService);
            $manager->flush();

            return $this->redirectToRoute('app_option_service_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('option_service/new.html.twig', [
            'evenements' => $evenementRepository->findAll(),
            'form' => $form->createView()
        ]);
    }
}
