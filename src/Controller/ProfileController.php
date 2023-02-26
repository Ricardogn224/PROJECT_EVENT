<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditUserPictureType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

#[Route('/profil')]
class ProfileController extends AbstractController
{
    #[Route('/', name: 'app_profile')]
    public function profil(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        //$error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('profile/profile.html.twig', ['last_username' => $lastUsername]);
    }

    #[Route('/{id}/edit-picture-user', name: 'app_profile_edit_picture_user', methods: ['GET', 'POST'])]
    public function profilEditPicture(User $user, Request $request, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(EditUserPictureType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $manager->persist($user);
            $manager->flush();

            return $this->render('profile/profile.html.twig');
        }

        return $this->render('profile/editPictureUser.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
