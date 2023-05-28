<?php

namespace App\Controller;

use App\Repository\DisponibiliteRepository;
use App\Repository\EvenementRepository;
use App\Repository\ServiceRepository;
use Exception;
use PhpParser\Node\Stmt\Foreach_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
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
        $eventsName = [];
        $events = $evenementRepository->findAll();
        foreach ($events as $event) {
            $eventsName[] = $event->getNom();
        }

        $arr = [
            "succeed" => $eventsName
        ];

        return new JsonResponse($arr);

    }

    #[Route('/isLogged', name: 'app_is_logged', methods: ['GET', 'POST'])]
    public function isLogged(Request $request, EntityManagerInterface $manager): Response
    {

        $resp = "";

        if ($this->getUser()) {
            
            $resp = "logged";
        }else {
            $resp = 'not logged';
        }

        $arr = [
            "succeed" => $resp
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

        $requestEmpty = true;

        foreach ($request->request->all() as $req => $value) {
            if ($value !== "" ||  $value != null) {
                $requestEmpty = false;
            }
        }

        if ($requestEmpty) {
            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }

        
        #dd($request->request->get('Mariage'));
        #recuppérer les input renseigner 
        #on prend le cas ou il y'a que min price est renseigner
        $minPrice = $request->request->get('minPrice');

        #on prend le cas ou max price est renseigner
        $maxPrice = $request->request->get('maxPrice');

        #on prend le cas ou il y'a les deux 
        $services = [];
        /*if ($minPrice != "") {
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
        }*/
        $servicePrice = [];
        $servicePrice['empty'] = true;
        if ($maxPrice ==='' && $minPrice ==='' ) {
            $servicePrice = $servicePrice;
        } else if ($minPrice !== "" && $maxPrice !== "") {
            $serviceArrEntity = $serviceRepository->findByBetweenPrice($minPrice,$maxPrice);
            foreach ($serviceArrEntity as $entity) {
                $servicePrice[] = $entity->getId();
            }
            $servicePrice['empty'] = false;
        }else if ($minPrice !== "") {
            $serviceArrEntity = $serviceRepository->findByPriceSuperieur($minPrice);
            foreach ($serviceArrEntity as $entity) {
                $servicePrice[] = $entity->getId();
            }
            $servicePrice['empty'] = false;
        }else if ($maxPrice !== "") {
            $serviceArrEntity = $serviceRepository->findByPriceInferieur($maxPrice);
            foreach ($serviceArrEntity as $entity) {
                $servicePrice[] = $entity->getId();
            }
            $servicePrice['empty'] = false;
        }

        #on recupère tout les evenements
        
        $events = $evenementRepository->findAll();
        

        #pour chaque evenement on ajoute à la liste des evements

        
        $serviceEvent = [];
        $serviceEvent['empty'] = true;
        foreach ($events as $event) {
           
            $services5 = $serviceRepository->findByEvent($request->request->get($event->getNom()));
            if ($services5) {  
                $serviceArrEntity = $services5;
                foreach ($serviceArrEntity as $entity) {
                    $serviceEvent[] = $entity->getId();
                }
                $serviceEvent['empty'] = false;
            }

        }

        $serviceNote = [];
        $serviceNote['empty'] = true;
        if ($request->request->get('note') !== '') {
            $notesEntities = $serviceRepository->findByNote($request->request->get('note'));
            foreach ($notesEntities as $notesEntitie) {
                $serviceNote[] = $notesEntitie->getId();
            }
            $serviceNote['empty'] = false;
        }



        $services[] = $servicePrice;

        $services[] = $serviceEvent;

        $services[] = $serviceNote;



        # on supprime les doublons 

        $serviceJoin = [];
        for($i = 0;$i < count($services);$i++) {
            if ($services[$i]['empty'] != true) {
                $serviceJoin[] = $services[$i];
            }

        } 

        $se = [];
        for($i = 0;$i < count($serviceJoin);$i++) {
            if ($i == 0) {
                $se[0] = $serviceJoin[$i];
            }
            if (isset($serviceJoin[$i+1])) {
                $se[0] = array_intersect($se[0], $serviceJoin[$i+1]);
            }

        } 

        unset($se[0]['empty']);

        return $this->render('home/index.html.twig', [
            /* 'form' => $form->createView(), */
            'services' => $serviceRepository->findBy(array('id' => $se[0])),
             'evenements' => $evenementRepository->findAll(),
            'disponibilites' => $disponibiliteRepository->findFirstDispo(),
        ]);
    }
}
