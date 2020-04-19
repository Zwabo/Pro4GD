<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Userplant;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class UserplantController extends AbstractController
{
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
     * @Route("/userplant", name="userplant")
     */
    public function index()
    {
        $userplants = $this->getDoctrine()->getRepository('App:Userplant')->findAll();

        return $this->render('userplant.html.twig', [
            'controller_name' => 'UserplantController', 'userplants' => $userplants
        ]);
    }

    /*public function createUserplant(): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $userplant = new Userplant();
        $userplant->setIdUser("1");
        $userplant->setIdPlant("1");
        $userplant->setName("Keyboard");
        $userplant->setLocation("Keyboard");
        $userplant->setNotes("Keyboard");
        $userplant->setDateAdded(date('m/d/Y h:i:s', time));
        $userplant->setDateWatered(date('m/d/Y h:i:s', time));

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($userplant);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new userplant with id '.$userplant->getId());
    }*/
}
