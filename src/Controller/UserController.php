<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use App\Entity\Userplant;
use App\Entity\Award;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    /**
     * @Route("/api/profile/{username}", name="profile")
     */
    public function getProfileUser($username) : JsonResponse {

        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        if (!$user) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($user->toAssoc(), Response::HTTP_OK);
    }

    /**
     * @Route("/api/profile/{username}/setDescription", name="setName", methods={"PUT"})
     */
    public function setProfileUserDescription($username, Request $request){
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        if (!$user) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $data = $request->getContent();
        $user->setDescriptioin($data); //Set description to new text
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($user->toAssoc(), Response::HTTP_OK);
    }

    /**
     * @Route("/api/profile/{username}/userplants", name="profile_userplant", methods={"GET"})
     */
    public function getProfileUserplant($username){
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        $userid = $user->getId();

        $plants = $this->getDoctrine()
            ->getRepository(Userplant::class)
            ->findAll();

        $userplantsProfile = [];

        foreach($plants as $plant) {
            $userplantsProfile[] = $plant->toAssoc();
        }

        return new JsonResponse($userplantsProfile, Response::HTTP_OK);
    }

    /**
     * @Route("/api/profile/{username}/friends", name="profile_friends", methods={"GET"})
     */
    public function getProfileFriends($username) {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        $friends = [];

        foreach($user->getOutgoingFriendRequests() as $request){
            if($request->getConfirmed()){
                $id = $request->getReceiver()->getId();
                $username = $request->getReceiver()->getUsername();
                $firstName = $request->getReceiver()->getFirstName();
                $lastName = $request->getReceiver()->getLastName();
                $level = $request->getReceiver()->getLevel();
                $userPic = $request->getReceiver()->getUserPic();

                $friendData = [
                    'id' => $id,
                    'username' => $username,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'level' => $level,
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
                $level = $request->getSender()->getLevel();
                $userPic = $request->getSender()->getUserPic();

                $friendData = [
                    'id' => $id,
                    'username' => $username,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'level' => $level,
                    'userPic' => $userPic
                ];
                array_push($friends, $friendData);
            }
        }
        return new JsonResponse($friends, Response::HTTP_OK);
    }

    /**
     * @Route("/api/profile/{username}/setDescription", name="profile_userdescription", methods={"PUT"})
     */
    public function setProfileDescription($username, Request $request) {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        if (!$user) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $data= $request->getContent();
        $user->setDescription($data);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($user->toAssoc(), Response::HTTP_OK);
    }

    /**
     * @Route("/api/profile/{username}/saveComment", name="profile_comments", methods={"PUT"})
     */
    public function saveComment($username, Request $request) {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        if (!$user) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $profileComments = [];

        if ($user->getComments() != null) {
            $profileComments = $user->getComments();
        }

        $comment = $request->getContent();              //gets json string --> we need an array
        //$comment = var_dump(json_decode($comment, true));
        $comment = json_decode($comment);


        array_push($profileComments, $comment);

        $user->setComments($profileComments);
        $user->addNotification("Neuer Kommentar auf deiner Profil-Seite!", $comment->msg);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($user->toAssoc(), Response::HTTP_OK);
    }

    /**
     * @Route("/api/profile/{username}/deleteComment", name="delete_comments", methods={"PUT"})
     */
    public function deleteComment($username, Request $request) {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        if (!$user) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $commentArray = $request->getContent();
        $commentArray = json_decode($commentArray);

        $user->setComments($commentArray);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($user->toAssoc(), Response::HTTP_OK);
    }

    /**
     * @Route("/api/notifications/{id}/get", name="getNotifications", methods={"GET"})
     */
    public function getUserNotifications($id){
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);

        $notifications = $user->getNotifications();

        return new JsonResponse($notifications, Response::HTTP_OK);
    }

    /**
     * @Route("/api/notifications/{id}/clear", name="clearNotifications", methods={"POST"})
     */
    public function clearUserNotifications($id){
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);

        $user->clearNotifications();
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse(Response::HTTP_OK);
    }

    /**
     * @Route("/api/profile/{username}/addNewAward", name="addNewAward", methods={"PUT"})
     */
    public function addNewAward($username, Request $request)
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        if (!$user) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $data = $request->getContent();

        $award = $this->getDoctrine()
            ->getRepository(Award::class)
            ->findOneBy(['name' => $data]);

        if (!$award) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $award = $award->toAssoc();
        $awardsArray = $user->getAwards();
        array_push($awardsArray, $award);

        $user->setAwards($awardsArray);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($user->toAssoc(), Response::HTTP_OK);
    }

    /**
     * @Route("/api/profile/{username}/setMemberAward", name="setMemberAward", methods={"PUT"})
     */
    public function setMemberAwardVar($username, Request $request) : JsonResponse
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        if (!$user) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $memberAward = $request->getContent();

        $user->setMemberAward($memberAward);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($user->toAssoc(), Response::HTTP_OK);
    }

    /**
     * @Route("/api/profile/{username}/setFriendsAward", name="setFriendsAward", methods={"PUT"})
     */
    public function setFriendsAwardVar($username, Request $request) : JsonResponse
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        if (!$user) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $friendsAward = $request->getContent();

        $user->setFriendsAward($friendsAward);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($user->toAssoc(), Response::HTTP_OK);
    }

    /**
     * @Route("/api/profile/{username}/setLivedAward", name="setLivedAward", methods={"PUT"})
     */
    public function setLivedAwardVar($username, Request $request) : JsonResponse
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        if (!$user) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $livedAward = $request->getContent();

        $user->setLivedAward($livedAward);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($user->toAssoc(), Response::HTTP_OK);
    }

    /**
     * @Route("/api/profile/{username}/setUserplantAddedAward", name="setUserplantAddedAward", methods={"PUT"})
     */
    public function setUserplantAddedAwardVar($username, Request $request) : JsonResponse
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        if (!$user) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $userplantAdded = $request->getContent();

        $user->setUserplantAward($userplantAdded);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($user->toAssoc(), Response::HTTP_OK);
    }

    /**
     * @Route("/api/profile/{username}/setWateredAward", name="setWateredAward", methods={"PUT"})
     */
    public function setWateredAwardVar($username, Request $request) : JsonResponse
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        if (!$user) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $userplantWatered = $request->getContent();

        $user->setWateredAward($userplantWatered);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($user->toAssoc(), Response::HTTP_OK);
    }

    /**
     * @Route("/api/profile/{username}/setLvlAward", name="setLvlAward", methods={"PUT"})
     */
    public function setLvlAwardVar($username, Request $request) : JsonResponse
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        if (!$user) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $lvlAward = $request->getContent();

        $user->setLvlAward($lvlAward);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($user->toAssoc(), Response::HTTP_OK);
    }

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