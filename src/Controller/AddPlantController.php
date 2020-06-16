<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Plant;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AddPlantController extends AbstractController
{

    /**
     * @Route("/api/addPlant/", name="addPlants", methods={"GET"})
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

    /**
     * @Route("/api/addPlant/createNewPlant/", name="addPlant_create")
     */
    public function addPlantCreate(Request $request, ValidatorInterface $validator) : JsonResponse
    {
        $data = $request->getContent();
        $params = json_decode($data, true);

        /** @var \App\Entity\Plant $plant */
        $plant = new Plant();

        $plant->setName($params["name"]);
        $plant->setLinkName($params["linkName"]);
        $plant->setAlternativeName($params["alternativeName"]);
        $plant->setLatinName($params["latinName"]);
        $plant->setGenus($params["genus"]);
        $plant->setCareLevel($params["careLevel"]);
        $plant->setWateringAmount($params["wateringAmount"]);
        $plant->setLocationIcon($params["locationIcon"]);
        $plant->setTemperatureIcon($params["temperatureIcon"]);
        $plant->setFertiliserIcon($params["fertiliserIcon"]);
        $plant->setSubstrateIcon($params["substrateIcon"]);
        $plant->setHeydayIcon($params["heydayIcon"]);
        $plant->setHeightIcon($params["heightIcon"]);
        $plant->setSpecialFeatureIcon($params["specialFeatureIcon"]);
        $plant->setShortDescription($params["shortDescription"]);
        $plant->setSpecialFeaturesAddinfo($params["specialFeaturesAddinfo"]);
        $plant->setLocationAddinfo($params["locationAddinfo"]);
        $plant->setTemperatureAddinfo($params["temperatureAddinfo"]);
        $plant->setPot($params["pot"]);
        $plant->setWateringAmountAddinfo($params["wateringAmountAddinfo"]);
        $plant->setSubstrateAddinfo($params["substrateAddinfo"]);
        $plant->setFlowerColor($params["flowerColor"]);
        $plant->setHeydayAddinfo($params["heydayAddinfo"]);
        $plant->setCareTips($params["careTips"]);
        $plant->setCategory($params["category"]);

        $plant->setIcon($params["icon"]);
        $plant->setWindowIcon($params["windowIcon"]);

        $errors = $validator->validate($plant);
        if(count($errors) > 0){
            return new JsonResponse((string) $errors, Response::HTTP_CONFLICT);
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($plant);
        $entityManager->flush();

        return new JsonResponse('Saved new platn with id ' .$plant->getId(), Response::HTTP_OK);
    }



}


