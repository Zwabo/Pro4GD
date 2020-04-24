<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Plant;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class PlantController extends AbstractController {
    /**
     * @Route("/plant", name="plant")
     */
    public function plant()
    {
        return $this->render('searchPlant.html.twig', [
            'controller_name' => 'PlantController'
        ]);
    }


    /**
     * @Route("/plant/{name}", name="plant")
     */
    /*public function index($name)
    {
        $plant = $this->getDoctrine()->getRepository(Plant::class)->find($name);

        if (!$plant) {
            throw $this->createNotFoundException(
                'No plant found for plant ' . $plant
            );
        }

        return $this->render('plant.html.twig', [
            'controller_name' => 'PlantController', 'plant' => $plant
        ]);
    }*/

    /**
     * @Route("/plant/{name}", name="plantName")
     */
    public function index($name)
    {
        $plant = $this->getDoctrine()->getRepository('App:Plant')->findOneBy(array('name' => $name));

        return $this->render('plant.html.twig', [
            'controller_name' => 'PlantController', 'plant' => $plant
        ]);
    }
}