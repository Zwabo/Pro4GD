<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Userplant;
use App\Entity\Plant;

use Symfony\Component\HttpFoundation\JsonResponse;

class GardenController extends AbstractController
{
    /**
     * @Route("/api/garden/{id}", name="garden", methods={"GET"})
     */
    public function getGarden($id) : JsonResponse
    {
        $userplants = $this->getDoctrine()->getRepository(Userplant::class)->findBy(['user' => $id]);
        $plants = $this->getDoctrine()->getRepository(Plant::class)->findAll();

        if (!$userplants) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $garden = [];
        foreach ($userplants as $userplant) {
            $garden [] = $userplant->toAssoc();
        }


        return new JsonResponse($garden, Response::HTTP_OK);

    }

    /**
     * @Route("/api/garden/", name="data", methods={"GET"})
     */
    public function getPlants() : JsonResponse
    {
        $plants = $this->getDoctrine()->getRepository(Plant::class)->findAll();

        if (!$plants) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $garden = [];
        foreach ($plants as $plant) {
            $garden [] = $plant->toAssoc();
        }

        return new JsonResponse($garden, Response::HTTP_OK);

    }

}


