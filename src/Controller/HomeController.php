<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(SerializerInterface $serializer)
    {
        if($this->getUser() != null){
            return $this->render('index.html.twig', [
                'user' => $this->getUser()->toAssoc()
            ]);
        }
        else{
            return $this->render('index.html.twig', [
                'user' => null
            ]);
        }
    }

    /**
     * @Route("/", name="home")
     */
    /*public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('garden');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('index.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }*/


    /**
     * @Route("/", name="home")
     */
    /**
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        /*if ($this->getUser()) {
            return $this->redirectToRoute('garden');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('index.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
     */
}