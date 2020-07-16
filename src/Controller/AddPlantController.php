<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Plant;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
* @IsGranted({"ROLE_ADMIN", "ROLE_SUPPORT_USER"})
 */
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
     * upload new plant file images
     * @Route("/api/uploadPlantFile/", name="uploadPlantFile", methods={"POST"})
     */
    public function uploadPlantImage(Request $request) : JsonResponse
    {
        $data = $request->getContent();
        $params = json_decode($data, true);

        $plantPicture = $params["iconElement"];
        $plantPictureName = $params["iconName"];
        $plantPictureName = md5(uniqid()).'.'.$plantPicture->guessExtension();

        $plantBackground = $params["windowIconElement"];
        $plantBackgroundName = $params["windowIconName"];
        $plantBackgroundName =md5(uniqid()).'.'.$plantBackground->guessExtension();

        $plantPicture->move(
            /*$this->getParameter('plantPictures_directory'),/*folder*/
            '.../public/images/plants',
            $plantPictureName/*pictureName*/
        );

        $plantBackground->move(
            '.../public/images/plants',
            $plantBackgroundName
        );

        $entityManager=getDoctrine()->getManager();

        return new JsonResponse([], Response::HTTP_OK);
    }

    /**
     * @Route("/api/{plantid}/addPlant/createNewPlant/addPicture", name="addPlantPicture")
     */
    public function addPlantPicture($plantid, Request $request) : JsonResponse {
        $picture = $request->getContent();                  // string
        //$picture = json_decode($picture, true);

        $extension = $picture->guessExtension();

        $plantPictures_directory = $this->getParameter('plantPictures_directory');

        $picture->move($plantPictures_directory, $picture);

    }

    /**
     * @Route("/api/addPlant/createNewPlant/", name="addPlant_create")
     */
    public function addPlantCreate(Request $request, ValidatorInterface $validator) : JsonResponse
    {
        $data = $request->getContent();

        $params = json_decode($data, true);

        /*get the file first to send it to the background to save*/

        /*$plantPicture = $params["iconElement"];         // comes as an array not a file, we need file itself - file is sent into the background
        $plantBackground = $params["windowIconElement"];

        $plantPictureName = $params["iconElementName"];     // the name needs to be decoded to afterwards

        /*create a filename so that filename is unique*/
        //$plantPictureName = $plantPicture.'-'.md5(uniqid()).'.'.$plantPicture->guessExtension();       guessExtension is only possible with files

        /*$plantPictures_directory = $this->getParameter('plantPictures_directory');

        //$plantPicture->move($plantPictures_directory, end($plantPictureName));                        move is only possible with files

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

        return new JsonResponse($plant->getId(), Response::HTTP_OK);
    }



}


