<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Plant;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class PlantController extends AbstractController {
    /**
     * @Route("/plant", name="app_plant")
     */
    public function plant()
    {
        return $this->render('searchPlant.html.twig', [
            'controller_name' => 'PlantController'
        ]);
    }

    /**
     * @Route("/plant/{linkName}", name="plantName")
     */
    public function index($linkName)
    {
        $plant = $this->getDoctrine()->getRepository('App:Plant')->findAll();

        foreach ($plant as $dataPlant) {
            $plant = $this->getDoctrine()->getRepository('App:Plant')->findOneBy(array('linkName' => $linkName));
        }

        return $this->render('plant.html.twig', [
            'controller_name' => 'PlantController', 'plant' => $plant
        ]);
    }
}