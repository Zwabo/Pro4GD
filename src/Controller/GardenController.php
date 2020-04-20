<?php

namespace App\Controller;

use App\Entity\Plant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class GardenController extends AbstractController
{
    /**
     * @Route("/garden", name="garden")
     */
    public function index()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $plants = $this->getDoctrine()->getRepository('App:Plant')->findAll();

        return $this->render('myGarden.html.twig', [
            'controller_name' => 'GardenController', 'plants' => $plants
        ]);
    }
}
