<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Userplant;

use Symfony\Component\HttpFoundation\JsonResponse;

class GardenController extends AbstractController
{
    /**
     * @Route("/api/garden/", name="garden")
     */
    public function index()
    {
        $userplants = $this->getDoctrine()->getRepository(Userplant::class)->findAll();

        if (!$userplants) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $garden = [];
        foreach ($userplants as $userplant) {
            $garden[] = $userplant->toAssoc();
        }

        return new JsonResponse($garden, Response::HTTP_OK);

    }

}


