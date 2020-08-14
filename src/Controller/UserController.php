<?php

namespace App\Controller;

use App\Entity\Thread;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use App\Entity\Userplant;
use App\Entity\Award;
use App\Entity\Plant;
use App\Entity\Threads;
use App\Entity\Comment;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }
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
     * @Route("/api/profile/{username}/setBirthday", name="setBirthday", methods={"PUT"})
     */
    public function setProfileUserBirthday($username, Request $request) {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $username]);

        if (!$user) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $data = $request->getContent();
        $params = json_decode($data, true);

        $birthday = $params["newBirthday"];     //string
        /*$birthday = strtotime($birthday);       //should
        echo date('YYYY-MM-DD:H:i:s');
        $birthday = date('YYYY-MM-DD:H:i:s', $birthday);*/
        $birthday = date_create_from_format('Y-m-d H:i:s', $birthday);

        $user->setDateBirth($birthday);
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
            ->findBy(['user' => $userid]);

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
                $xp = $request->getReceiver()->getXP();
                $lvlAward = $request->getReceiver()->getLvlAward();

                $friendData = [
                    'id' => $id,
                    'username' => $username,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'level' => $level,
                    'userPic' => $userPic,
                    'xp' => $xp,
                    'lvlAward' => $lvlAward,
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
                $xp = $request->getSender()->getXP();
                $lvlAward = $request->getSender()->getLvlAward();

                $friendData = [
                    'id' => $id,
                    'username' => $username,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'level' => $level,
                    'userPic' => $userPic,
                    'xp' => $xp,
                    'lvlAward' => $lvlAward,
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
     * @Route("/api/profile/getFriendXP/{friendname}", name="getFriendXP", methods={"GET"})
     */
    public function getFriendXP($friendname, Request $request) : JsonResponse
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $friendname]);

        if (!$user) {
            return new JsonResponse([], Response::HTTP_FORBIDDEN);
        }

        $xp = $user->getXP();

        return new JsonResponse($xp, Response::HTTP_OK);
    }

    /**
     * @Route("/api/profile/getCreatedThreads/{userId}", name="getCreatedThreads", methods={"GET"})
     *
     **/
    public function getCreatedThreads($userId, Request $request) : JsonResponse
    {
        $threads = $this->getDoctrine()
            ->getRepository(Thread::class)
            ->findBy(['user' => $userId]);

        $threadAssoc = [];
        foreach($threads as $thread) {
            $thread = $thread->toAssoc();
            array_push($threadAssoc, $thread);
        }

        return new JsonResponse($threadAssoc, Response::HTTP_OK);
    }

    /**
     * @Route("/api/profile/getWrittenComments/{userId}", name="getWrittenComments", methods={"GET"})
     */
    public function getWrittenComments($userId, Request $request) : JsonResponse
    {
        $comments =  $this->getDoctrine()
            ->getRepository(Comment::class)
            ->findBy(['user' => $userId]);

        $commentsAssoc = [];
        foreach($comments as $comment) {
            $comment = $comment->toAssoc();
            array_push($commentsAssoc, $comment);
        }

        return new JsonResponse($commentsAssoc, Response::HTTP_OK);
    }


    /**
     * @Route("/api/profile/getThreadToComment/{commentId}", name="getThreadToComment", methods={"GET"})
     */
    public function getThreadToComment($commentId, Request $request) : JsonResponse
    {
        $comment =  $this->getDoctrine()
            ->getRepository(Comment::class)
            ->find($commentId);

        if(!$comment) {
            new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $thread = $comment->getThread();

        return new JsonResponse($thread, Response::HTTP_OK);
    }

    /**
     * @Route("/api/profile/setProfilePic/{userId}", name="setProfilePic", methods={"POST"})
     */
    public function setProfilePic($userId, Request $request) : JsonResponse
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        $requestUser =  $this->getDoctrine()
            ->getRepository(Comment::class)
            ->find($userId);

        if($requestUser != $user){
            new JsonResponse([], Response::HTTP_FORBIDDEN);
        }

        $file = $request->files->get('file');

        if (empty($file))
        {
            return new JsonResponse("No file specified",
                Response::HTTP_UNPROCESSABLE_ENTITY, ['content-type' => 'text/plain']);
        }

        $fileName = $user->getUsername().'.'.$file->guessExtension();
        $file->move($this->getParameter('userPictures_directory'), $fileName);
        $user->setUserPic('/images/pictures/'.$fileName);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse($user->toAssoc(),  Response::HTTP_OK);
    }
}