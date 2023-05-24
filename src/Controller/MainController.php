<?php

namespace App\Controller;

use App\Repository\DisponibiliteRepository;
use App\Repository\EvenementRepository;
use App\Repository\ServiceRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(EvenementRepository $evenementRepository): Response
    {


        return $this->render('base.html.twig', [
            'evenements' => $evenementRepository->findAll(),
        ]);
    }
    
    #[Route('/get-event', name: 'app_main_all_event', methods: ['GET', 'POST'])]
    public function getEvent(EvenementRepository $evenementRepository): Response
    {

        $arr = [
            "succeed" => $evenementRepository->findAll()
        ];

        return new JsonResponse($arr);

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

    #[Route('/filter', name: 'app_filter_info')]
    public function filter_info(ServiceRepository $serviceRepository, EvenementRepository $evenementRepository, Request $request, DisponibiliteRepository $disponibiliteRepository): Response
    {
        #dd($request->request->get('Mariage'));
        #recuppérer les input renseigner 
        #on prend le cas ou il y'a que min price est renseigner
        $minPrice = $request->request->get('minPrice');

        #on prend le cas ou max price est renseigner
        $maxPrice = $request->request->get('maxPrice');

        #on prend le cas ou il y'a les deux 
        $services = [];
        if ($minPrice != "") {
            $services1 = $serviceRepository->findByPriceInferieur($maxPrice);
            $services = array_merge($services,$services1);
        }else if ($maxPrice != "") {
            $services2 = $serviceRepository->findByPriceSuperieur($minPrice);
            $services = array_merge($services,$services2);
        }else if ($maxPrice ==='' && $minPrice ==='' ) {
            $services3 = [];
            $services = array_merge($services,$services3);
        } else if ($minPrice != "" && $maxPrice != "") {
            $services4 = $serviceRepository->findByBetweenPrice($minPrice,$maxPrice);
            $services = array_merge($services,$services4);
        }

        #on recupère tout les evenements
        
        $events = $evenementRepository->findAll();
        

        #pour chaque evenement on ajoute à la liste des evements

        

        foreach ($events as $event) {
           
            $services5 = $serviceRepository->findByEvent($request->request->get($event->getNom()));
            if ($services5) {  
                $services = array_merge($services, $services5);
            }

        }
        # on supprime les doublons 
        $services = array_unique($services);


        #On recupère l

        


        return $this->render('home/index.html.twig', [
            /* 'form' => $form->createView(), */
            'services' => $services,
            'evenements' => $evenementRepository->findAll(),
            'disponibilites' => $disponibiliteRepository->findFirstDispo(),
        ]);
    }
}
