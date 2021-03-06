<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Plant;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class DatabaseController extends AbstractController
{
    /**
     * @Route("/api/database/", name="getPlants", methods={"GET"})
     */
    public function getPlants() : JsonResponse
    {


        $plants = $this->getDoctrine()->getRepository(Plant::class)->findAll();

        if (!$plants) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $database = [];
        foreach ($plants as $plant) {
            $database [] = $plant->toAssoc();
        }

        return new JsonResponse($database, Response::HTTP_OK);

    }

}


