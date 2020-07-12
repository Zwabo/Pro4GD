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
        $userplant->setWateringCycle($params["cycle"]);

        $userplant->setUser($user);
        $userplant->setPlant($plant);

        $errors = $validator->validate($userplant);
        if(count($errors) > 0){
            return new JsonResponse((string) $errors, Response::HTTP_CONFLICT);
        }

        if ($userplant->getPlant()->getCareLevel() === 'gering') {
            $user->setXP($user->getXP() + 10);
            $userplant->setXP($userplant->getXP() +10);
        } else if($userplant->getPlant()->getCareLevel() === 'mittel'){
            $user->setXP($user->getXP() + 15);
            $userplant->setXP($userplant->getXP() +15);
        } else if($userplant->getPlant()->getCareLevel() === 'hoch'){
            $user->setXP($user->getXP() + 20);
            $userplant->setXP($userplant->getXP() +20);
        } else {
            $user->setXP($user->getXP() + 25);
            $userplant->setXP($userplant->getXP() +25);
        }


        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($userplant);
        $entityManager->persist($user);
        $entityManager->flush();

        return new JsonResponse(Response::HTTP_OK);
    }

    /**
     * @Route("/api/garden/setWateringDate/{id}", name="setWateringDate", methods={"PUT"})
     */
    public function setWateringDate($id, Request $request){
        $userplant = $this->getDoctrine()
            ->getRepository(Userplant::class)
            ->find($id);

        if (!$userplant) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $data = $request->getContent();
        $dateAdded = date_create($data);

        $userplant->setDateWatered($dateAdded);

        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        if ($userplant->getPlant()->getCareLevel() === 'gering') {
            $user->setXP($user->getXP() + 5);
            $userplant->setXP($userplant->getXP() +5);
        } else if($userplant->getPlant()->getCareLevel() === 'mittel'){
            $user->setXP($user->getXP() + 10);
            $userplant->setXP($userplant->getXP() +10);
        } else if($userplant->getPlant()->getCareLevel() === 'hoch'){
            $user->setXP($user->getXP() + 15);
            $userplant->setXP($userplant->getXP() +15);
        } else {
            $user->setXP($user->getXP() + 20);
            $userplant->setXP($userplant->getXP() +20);
        }

        $this->getDoctrine()->getManager()->persist($user);
        $this->getDoctrine()->getManager()->persist($userplant);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($userplant->toAssoc(), Response::HTTP_OK);
    }


    /**
     * @Route("/api/garden/removeUserplant/{id}", name="removeUserplant", methods={"DELETE"})
     */
    public function sremovePlant($id){
        $userplant = $this->getDoctrine()
            ->getRepository(Userplant::class)
            ->find($id);

        if (!$userplant) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $this->getDoctrine()->getManager()->remove($userplant);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse(Response::HTTP_OK);
    }

    /**
     * @Route("/api/garden/{id}/setCounterWatered", name="setCounterWatered", methods={"PUT"})
     */
    public function setCounterWatered($id){
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);

        if (!$user) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $counterWatered = $user->getCounterPlantsWatered();
        if ($counterWatered == null) {
            $counterWatered = 1;
        } else {
            $counterWatered++;
        }

        $user->setCounterPlantsWatered($counterWatered);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($user->toAssoc(), Response::HTTP_OK);
    }

}


