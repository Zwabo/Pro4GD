<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    private function assignParameters(User $user, Request $request) : User
    {
        $data = json_decode($request->getContent(), true);
        return $user;
    }

    /**
     * @Route("/api/profile/{username}", name="profile")
     */
    public function getUser($username) : JsonResponse {
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