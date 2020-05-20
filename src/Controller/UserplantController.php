<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Userplant;
use App\Entity\Plant;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserplantController extends AbstractController
{

    /**
     * @Route("/api/userplant/{id}", name="userplant", methods={"GET"})
     */
    public function getUserplant($id){
        $userplant = $this->getDoctrine()
            ->getRepository(Userplant::class)
            ->find($id);

        if (!$userplant) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }
        if($userplant->getUser() != $this->getUser()){
            return new JsonResponse([], Response::HTTP_FORBIDDEN);
        }

        return new JsonResponse($userplant->toAssoc(), Response::HTTP_OK);
    }

    /**
     * @Route("/api/userplant/setName/{id}", name="setName", methods={"PUT"})
     */
    public function setName($id, Request $request){
        $userplant = $this->getDoctrine()
            ->getRepository(Userplant::class)
            ->find($id);

        if (!$userplant) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $data = $request->getContent();
        $userplant->setName($data); //Set notes to new text
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($userplant->toAssoc(), Response::HTTP_OK);
    }

    /**
     * @Route("/api/userplant/setNotes/{id}", name="setNotes", methods={"PUT"})
     */
    public function setNotes($id, Request $request){
        $userplant = $this->getDoctrine()
            ->getRepository(Userplant::class)
            ->find($id);

        if (!$userplant) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $data = $request->getContent();
        $userplant->setNotes($data); //Set notes to new text
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($userplant->toAssoc(), Response::HTTP_OK);
    }

    /**
     * @Route("/api/userplant/setPlant/{id}", name="setPlant", methods={"PUT"})
     */
    public function setPlant($id, Request $request){
        $userplant = $this->getDoctrine()
            ->getRepository(Userplant::class)
            ->find($id);

        if (!$userplant) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $data = $request->getContent();

        $plant = $this->getDoctrine()
            ->getRepository(Plant::class)
            ->findOneBy(['name' => $data]);

        $userplant->setPlant($plant); //Set notes to new text
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($userplant->toAssoc(), Response::HTTP_OK);
    }

    /**
     * @Route("/createUserplant", name="app_createUserplant")
     */
    public function createUserplant()
    {
        $entityManager = $this->getDoctrine()->getManager();

        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        $userplant = new Userplant();
        $userplant->setName("Testplant");
        $userplant->setLocation("Irgendwo");
        $userplant->setNotes("This plant is dope");
        $userplant->setDateAdded(new \DateTime("now"));
        $userplant->setDateWatered(new \DateTime("now"));

        $user->addUserplant($userplant);

        $entityManager->persist($userplant);
        $entityManager->flush();

        return new Response('Saved new userplant with id '.$userplant->getId());
    }
}


/**
 * @Route("/userplant", name="userplant")
 */
/*public function index()
{
    return $this->render('userplant.html.twig', [
        'controller_name' => 'UserplantController'
    ]);
}*/

/**
 * @Route("/userplant/{id}", name="userplant")
 */
/*
public function index($id)
{
    $userplant = $this->getDoctrine()
    ->getRepository(Userplant::class)
    ->find($id);

    if (!$userplant) {
        throw $this->createNotFoundException(
            'No userplant found for id ' . $id
        );
    }

    return $this->render('userplant.html.twig', [
        'controller_name' => 'UserplantController', 'userplant' => $userplant
    ]);
}
*/