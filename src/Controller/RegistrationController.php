<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/old/register", name="register")
     */
    /**
    public function registerOld(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, LoginFormAuthenticator $authenticator): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $user->setUsername($form->get('username')->getData());
            $user->setLevel(0);
            $user->setFirstName($form->get('firstName')->getData());
            $user->setLastName($form->get('lastName')->getData());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
        }

        $words = ['foo', 'bar'];

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'words' => $words
        ]);
    }
     */

    /**
     * @Route("/security/register", name="app_register", methods={"POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, ValidatorInterface $validator): JsonResponse
    {
        $user = new User();

        $data = $request->getContent();
        $params = json_decode($data, true);


            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $params["password"]
                ));
            $user->setEmail($params["email"]);
            $user->setUsername($params["username"]);
            $user->setFirstName($params["firstName"]);
            $user->setLastName($params["lastName"]);

            $user->setLevel(0);
            $user->setRoles(["ROLE_USER"]);

            $errors = $validator->validate($user);
            if(count($errors) > 0){
                return new JsonResponse((string) $errors, Response::HTTP_CONFLICT);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

        return new JsonResponse($user->toAssoc(), Response::HTTP_OK);

            // do anything else you need here, like send an email
    }
}
