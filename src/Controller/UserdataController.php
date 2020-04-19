<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserdataController extends AbstractController
{
    /**
     * @Route("/profile", name="profile")
     */
    public function index()
    {
        $userdata = $this->getDoctrine()->getRepository('App:Userdata')->findAll();

        return $this->render('userdata.html.twig', [
            'controller_name' => 'UserdataController', 'userdata' => $userdata
        ]);
    }
}
