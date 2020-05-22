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
        $incomingRequests = array();
        foreach($user->getOutgoingFriendRequests() as $request){
            if($request->getConfirmed()){
                $id = $request->getReceiver()->getId();
                $username = $request->getReceiver()->getUsername();
                $firstName = $request->getReceiver()->getFirstName();
                $lastName = $request->getReceiver()->getLastName();
                $userPic = $request->getReceiver()->getUserPic();

                $friendData = [
                    'id' => $id,
                    'username' => $username,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'userPic' => $userPic
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
                $userPic = $request->getSender()->getUserPic();

                $friendData = [
                    'id' => $id,
                    'username' => $username,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'userPic' => $userPic
                ];
                array_push($friends, $friendData);
            }
            elseif (!$request->getConfirmed()){
                $requestId = $request->getId();
                $userId = $request->getSender()->getId();
                $username = $request->getSender()->getUsername();
                $firstName = $request->getSender()->getFirstName();
                $lastName = $request->getSender()->getLastName();
                $userPic = $request->getSender()->getUserPic();

                $incomingRequestData = [
                    'requestId' => $userId,
                    'userId' => $userId,
                    'username' => $username,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'userPic' => $userPic
                ];
                array_push($incomingRequests, $incomingRequestData);
            }
        }

        $friendshipData = [
            'friends' => $friends,
            'incomingRequests' => $incomingRequests
        ];

        return new JsonResponse($friendshipData, Response::HTTP_OK);
    }
}