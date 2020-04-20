<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Userplant;
use App\Entity\Plant;


class GardenController extends AbstractController
{
    /**
     * @Route("/garden", name="garden")
     */
    public function index()
    {
        $id = 10;

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $plant = $this->getDoctrine()->getRepository('App:Plant')->findOneBy(array('name' => 'Aloe Vera'));

        $userplant = $this->getDoctrine()
            ->getRepository(Userplant::class)
            ->find($id);

        if (!$userplant) {
            throw $this->createNotFoundException(
                'No userplant found for id ' . $id
            );
        }

        return $this->render('myGarden.html.twig', [
            'controller_name' => 'GardenController', 'userplant' => $userplant, 'plant' => $plant
        ]);

    }

    public function getUserplant()
    {
        /** @var \App\Entity\Plant $plant */

        $userplant = $this->getDoctrine()->getRepository('App:Userplant')->findOneBy(array('name' => 'Alois'));

        $plant = $this->getDoctrine()->getRepository('App:Plant')->findOneBy(array('name' => 'Aloe Vera'));

        $plant->addUserplant($userplant);

        return new Response('Saved new userplant with id '.$userplant->getId());
    }
}
