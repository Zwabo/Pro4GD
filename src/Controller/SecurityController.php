<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    /*
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
         if ($this->getUser()) {
             return $this->redirectToRoute('garden');
         }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
    */
    /**
     * @Route("/security/login", name="app_login", methods={"POST"})
     */
    public function login() : JsonResponse{
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return new JsonResponse([
                'error' => 'Invalid login request: check that the Content-Type header is "application/json".'
            ], Response::HTTP_BAD_REQUEST);
        }

        if($this->getUser()){
            $userdata = $this->getUser()->toAssoc();
            return new JsonResponse($userdata, Response::HTTP_OK);
        }
        else{
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @Route("/security/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }



}
