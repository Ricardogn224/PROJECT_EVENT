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

    #[Route('/search', name: 'app_search_info')]
    public function search_info(ServiceRepository $serviceRepository, EvenementRepository $evenementRepository, Request $request, DisponibiliteRepository $disponibiliteRepository): Response
    {
        $searchData = $request->request->get('searchData');

        $arraySearch = explode(" ", $searchData);

        $array_id = [];

        foreach ($arraySearch as $key => $value) {
            $wordEntity = $serviceRepository->findBySearch($value);
            foreach ($wordEntity as $wEntity) {
                $array_id[] = $wEntity->getId();
            }
        }

        $arr_unique_id = array_unique($array_id);

        return $this->render('home/index.html.twig', [
            /* 'form' => $form->createView(), */
            'services' => $serviceRepository->findBy(array('id' => $arr_unique_id)),
            'evenements' => $evenementRepository->findAll(),
            'disponibilites' => $disponibiliteRepository->findFirstDispo(),
        ]);
    }
}
