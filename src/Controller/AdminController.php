<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserAdminType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'app_admin_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/manage-admin', name: 'app_admin_manage', methods: ['GET'])]
    public function manageAdmin(UserRepository $userRepository): Response
    {
        return $this->render('admin/manageAdmin.html.twig', [
            'utilisateurs' => $userRepository->findAll(),
        ]);
    }

    #[Route('/{id}/modify-admin', name: 'app_admin_edit', methods: ['GET', 'POST'])]
    public function modifyAdmin(Request $request, User $user, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(UserAdminType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $manager->persist($user);
            $manager->flush();


            return $this->redirectToRoute('app_admin_manage', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/editAdmin.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }

}