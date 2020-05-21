<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FriendsController extends AbstractController
{
    /**
     * @Route("/api/friends", name="getFriends")
     */
    public function friends()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /* @var \App\Entity\User $user */
        $user = $this->getUser();

        $friends = array();
        foreach($user->getOutgoingFriendRequests() as $request){
            if($request->getConfirmed()){
                $id = $request->getReceiver()->getId();
                $username = $request->getReceiver()->getUsername();
                $firstName = $request->getReceiver()->getFirstName();
                $lastName = $request->getReceiver()->getLastName();

                $friendData = [
                    'id' => $id,
                    'username' => $username,
                    'firstName' => $firstName,
                    'lastName' => $lastName
                ];
                array_push($friends, $friendData);
            }
        }
        foreach($user->getIncomingFriendRequests() as $request){
            if($request->getConfirmed()){
                $id = $request->getSender()->getId();
                $username = $request->getSender()->getUsername();
                $firstName = $request->getSender()->getFirstName();
                $lastName = $request->getSender()->getLastName();

                $friendData = [
                    'id' => $id,
                    'username' => $username,
                    'firstName' => $firstName,
                    'lastName' => $lastName
                ];
                array_push($friends, $friendData);
            }
        }
        return new JsonResponse($friends, Response::HTTP_OK);
    }
}