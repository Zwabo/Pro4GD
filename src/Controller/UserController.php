<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/profile", name="profile")
     */
    public function index()
    {
        $users = $this->getDoctrine()->getRepository('App:User')->findAll();

        return $this->render('profile.html.twig', [
            'controller_name' => 'UserController', 'users' => $users
        ]);
    }
}
