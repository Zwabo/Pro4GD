<?php
/**
 * Created by PhpStorm.
 * User: Verena
 * Date: 20.05.2020
 * Time: 15:05
 */

namespace App\Controller;


use App\Entity\Comment;

use App\Form\CommentForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route("/forum/thread/comment", name="commenttest")
     */
    public function CommentAction(Request $request)
    {
        $comment = new Comment();
        $form = $this->createForm(CommentForm::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $text = $form->get('text')->getData();
            $comment->setText($text);

            $dateCreated = date_create();
            $dateCreated->format('Y-m-d h.i.s');
            $comment->setCreated($dateCreated);

            /* @var \App\Entity\User $user */
            $user = $this->getUser();

            $comment->setUser($user);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();
        }

        return $this->render('forum/comment.html.twig', [
            'CommentForm' => $form->createView(),
            'Foo' => 'bar'
        ]);
    }

}