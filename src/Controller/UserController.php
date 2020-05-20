<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use App\Entity\Userplant;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    /**
     * @Route("/api/profile/{username}/userplants", name="userplant", methods={"GET"})
     */
    public function getProfileUserplant($username){

        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        $userid = $user->id;

        $userplant = $this->getDoctrine()
            ->getRepository(Userplant::class)
            ->findAll($userid);

        if (!$userplant) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }
        /*if($userplant->getUser() != $this->getUser()){
            return new JsonResponse([], Response::HTTP_FORBIDDEN);
        }*/

        return new JsonResponse($userplant->toAssoc(), Response::HTTP_OK);
    }

    /**
     * @Route("/api/profile/{username}", name="profile")
     */
    public function getProfileuser($username) : JsonResponse {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        if (!$user) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($user->toAssoc(), Response::HTTP_OK);
    }
/*
    public function getUserData($username) : JsonResponse {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);


        $rep = $this->getDoctrine()->getRepository(Entry::class);
        $entries = $rep->findAll($user->id);
        $userplant = [];
        foreach ($entries as $entry) {
            $userplants[] = $entry->toAssoc();
        }

        if (!$user) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse(array('user'=>$user,'userplant'=>$userplant)->toAssoc(), Response::HTTP_OK);
    }*/


/**
 * @Route("/profile", name="profile")
 */
    /*public function profile()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /* @var \App\Entity\User $user */
        /*$user = $this->getUser();

        return $this->render('profile.html.twig', [
            'controller_name' => 'UserController', 'user' => $user
        ]);
    }
    /**
     * @Route("/profile/friends", name="profile_friends")
     */
   /* public function friends()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /* @var \App\Entity\User $user */
  /*      $user = $this->getUser();

        $friends = array();
        foreach($user->getOutgoingFriendRequests() as $request){
            if($request->getConfirmed()){
                array_push($friends, $request->getReceiver());
            }
        }
        foreach($user->getIncomingFriendRequests() as $request){
            if($request->getConfirmed()){
                array_push($friends, $request->getSender());
            }
        }

        return $this->render('friends.html.twig', [
            'controller_name' => 'UserController',
            'user' => $user,
            'friends' => $friends
        ]);
    }*/
}