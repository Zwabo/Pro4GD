<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Userplant;
use App\Entity\Plant;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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

    /**
     * @Route("/api/garden/createUserplant/{plantId}", name="createUserplant", methods={"POST"})
     */
    public function createUserplant($plantId, Request $request, ValidatorInterface $validator): JsonResponse
    {

        $data = $request->getContent();
        $params = json_decode($data, true);

        $int = (int)$params["userId"];

        /** @var \App\Entity\User $user */
        $user = $this->getDoctrine()->getRepository(User::class)->find($int);

        /** @var \App\Entity\Userplant $userplant */
        $userplant = new Userplant();

        /** @var \App\Entity\Plant $plant */
        $plant = $this->getDoctrine()->getRepository(Plant::class)->find($plantId);

        if (!$plant) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $userplant->setName($params["name"]);
        $userplant->setLocation($params["location"]);
        if($params["notes"] == null) {
            $userplant->setNotes("No Notes added.");
        } else {
            $userplant->setNotes($params["notes"]);
        }
        $userplant->setDateAdded(new \DateTime("now"));
        $userplant->setDateWatered(new \DateTime("now"));

        $userplant->setUser($user);
        $userplant->setPlant($plant);

        $errors = $validator->validate($userplant);
        if(count($errors) > 0){
            return new JsonResponse((string) $errors, Response::HTTP_CONFLICT);
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($userplant);
        $entityManager->flush();

        return new JsonResponse(Response::HTTP_OK);
    }

    /**
     * @Route("/api/garden/setWateringDate/{id}", name="setWateringDate", methods={"PUT"})
     */
    public function setName($id, Request $request){
        $userplant = $this->getDoctrine()
            ->getRepository(Userplant::class)
            ->find($id);

        if (!$userplant) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $data = $request->getContent();
        $userplant->setWateringDate($data);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($userplant->toAssoc(), Response::HTTP_OK);
    }

}


