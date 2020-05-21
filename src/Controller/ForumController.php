<?php
/**
 * Created by PhpStorm.
 * User: Verena
 * Date: 20.05.2020
 * Time: 15:04
 */

namespace App\Controller;


use App\Entity\Comment;
use App\Entity\Thread;
use App\Form\CommentForm;
use App\Form\ThreadForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ForumController extends AbstractController
{
    /**
     * @Route("/forum/thread", name="threadtest")
     */
    public function ThreadAction(Request $request)
    {
        $thread = new Thread();
        $form = $this->createForm(ThreadForm::class, $thread);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
           $headLine = $form->get('headline')->getData();
            $thread->setHeadline($headLine);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($thread);
            $entityManager->flush();

            // do anything else you need here, like send an email
        }

        return $this->render('forum/forum.html.twig', [
            'threadForm' => $form->createView(),
            'Foo' => 'bar'
        ]);
    }
}