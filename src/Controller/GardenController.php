<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Userplant;
use App\Entity\Plant;


class GardenController extends AbstractController
{
    /**
     * @Route("/garden", name="garden")
     */
    public function index()
    {


        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $userplant = $this->getDoctrine()->getRepository('App:Userplant')->findOneBy(array('name' => 'Alois'));

        $plant = $this->getDoctrine()->getRepository('App:Plant')->findOneBy(array('name' => 'Aloe Vera'));


        $plant->addUserplant($userplant);

        return $this->render('myGarden.html.twig', [
            'controller_name' => 'GardenController', 'userplant' => $userplant
        ]);

    }
}
