<?php

namespace App\Controller;

use App\Entity\Favori;
use App\Entity\Service;
use App\Form\FavoriType;
use App\Repository\FavoriRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/favori')]
class FavoriController extends AbstractController
{
    #[Route('/', name: 'app_favori_index', methods: ['GET'])]
    public function index(FavoriRepository $favoriRepository): Response
    {
        #je recupère l'id de l'utilisateur 
        $userId = $this->getUser()->getId();

        $favoris = $favoriRepository->findAllByUserId($userId);

        #je recupere 
        //$favori = $favoriRepository->findByUser_id($user);

        return $this->render('favori/index.html.twig', [
            'favoris' => $favoris,
        ]);
    }

    #[Route('/new', name: 'app_favori_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FavoriRepository $favoriRepository): Response
    {
        $favori = new Favori();
        $form = $this->createForm(FavoriType::class, $favori);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $favoriRepository->save($favori, true);

            return $this->redirectToRoute('app_favori_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('favori/new.html.twig', [
            'favori' => $favori,
            'form' => $form,
        ]);
    }

    #[Route('/add/{id}', name: 'app_favori_add', methods: ['GET', 'POST'])]
    public function add(Request $request, Service $service, EntityManagerInterface $manager, FavoriRepository $favoriRepository): Response
    {
        $resp = "";

        if ($this->getUser()) {
            $userId = $this->getUser()->getId();

            if ($favoriRepository->findByUserId($userId, $service->getId()) == null) {

                $favori = new Favori();
                $favori->setService($service);
                $favori->setUser($this->getUser());

                $manager->persist($favori);
                $manager->flush();

                $resp = "oui";
            }else {
                $favori = $favoriRepository->findByUserId($userId, $service->getId());
                $resp = $favori->getService()->getId();

                $favoriRepository->remove($favori, true);
                $resp = "already";

                
            }

        }else {
            $resp = "login";
        }
        

        $arr = [
            "succeed" => $resp
        ];

        return new JsonResponse($arr);
    }

    #[Route('/{id}', name: 'app_favori_show', methods: ['GET'])]
    public function show(Favori $favori): Response
    {
        return $this->render('favori/show.html.twig', [
            'favori' => $favori,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_favori_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Favori $favori, FavoriRepository $favoriRepository): Response
    {
        $form = $this->createForm(FavoriType::class, $favori);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $favoriRepository->save($favori, true);

            return $this->redirectToRoute('app_favori_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('favori/edit.html.twig', [
            'favori' => $favori,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_favori_delete', methods: ['POST'])]
    public function delete(Request $request, Favori $favori, FavoriRepository $favoriRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$favori->getId(), $request->request->get('_token'))) {
            $favoriRepository->remove($favori, true);
        }

        return $this->redirectToRoute('app_favori_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/isFav/{id}', name: 'app_favori_is_fav', methods: ['GET', 'POST'])]
    public function isFav(Request $request, Service $service, EntityManagerInterface $manager, FavoriRepository $favoriRepository): Response
    {

        $resp = "";

        if ($this->getUser()) {
            #je recupère l'id de l'utilisateur 
            $userId = $this->getUser()->getId();

            $favori = $favoriRepository->findByUserId($userId, $service->getId());

            if ($favori == null) {
                $resp = 'noFav';
            }else{
                $resp = 'favIn';
            }
        }else {
            $resp = 'noFav';
        }

        $arr = [
            "succeed" => $resp
        ];

        return new JsonResponse($arr);
    }
}
