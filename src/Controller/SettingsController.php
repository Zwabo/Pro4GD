<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\User;

class SettingsController extends AbstractController
{
    /**
     * @Route("/api/settings/changePrivacySettings/{type}/{val}", name="changePrivacySettings", methods={"PUT"})
     */
    public function changePrivacySettings($type, $val) {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        switch($type){
            case "birthday":
                $user->setPrivacyBirthday($val);
                break;
            case "comments":
                $user->setPrivacyComments($val);
                break;
            case "friends":
                $user->setPrivacyFriends($val);
                break;
            case "garden":
                $user->setPrivacyGarden($val);
                break;
            case "forum":
                $user->setPrivacyForum($val);
                break;
        }

        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse([], Response::HTTP_OK);
    }
}
