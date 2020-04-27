<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

/**
 * @Route("/profile", name="profile")
 */
    public function profile()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /* @var \App\Entity\User $user */
        $user = $this->getUser();

        return $this->render('profile.html.twig', [
            'controller_name' => 'UserController', 'user' => $user
        ]);
    }
    /**
     * @Route("/profile/friends", name="profile_friends")
     */
    public function friends()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /* @var \App\Entity\User $user */
        $user = $this->getUser();

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
    }
}