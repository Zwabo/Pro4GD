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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForumController extends AbstractController
{

    /**
     * @Route("/forum/thread/{id}", methods={"GET","HEAD"})
     */
    public function showThread(Request $request, string $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Thread $thread */
        $thread = $entityManager->getRepository(Thread::class)->find($id);

        $comments = $entityManager->getRepository(Comment::class)->findBy(['thread' => $id]);

        $comment = new Comment();
        $form = $this->createForm(CommentForm::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $headLine = $form->get('Text')->getData();
            $comment->setText($headLine);
            $comment->setThread($thread);
            $comment->setUser($this->getUser());
            $timeStamp = $this->generateTimeStamp();
            $comment->setCreated($timeStamp);
            $comment->setUpdated($timeStamp);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();
        }

        return $this->render('forum/thread.html.twig', [
            'thread' =>$thread,
            'comments' => $comments,
            'commentForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/forum/threads")
     */
    public function showAllThreads(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Thread[] $threads */
        $threads = $entityManager->getRepository(Thread::class)->findAll();

        $thread = new Thread();
        $form = $this->createForm(ThreadForm::class, $thread);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $headLine = $form->get('headline')->getData();
            $thread->setHeadline($headLine);
            $thread->setUser($this->getUser());
            $timeStamp = $this->generateTimeStamp();
            $thread->setCreated($timeStamp);
            $thread->setUpdated($timeStamp);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($thread);
            $entityManager->flush();
        }

        return $this->render('forum/forum.html.twig', [
            'threads' => $threads,
            'threadForm' => $form->createView()
        ]);
    }
    /**
     * @Route("/forum/addComment")
     */
    public function addCommentToThread(Request $request)
    {
        $comment = new Comment();
        $form = $this->createForm(CommentForm::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $headLine = $form->get('Text')->getData();
            $comment->setText($headLine);
            $headLine = $form->get('threadId')->getData();

            $comment->setThread($thread);
            $comment->setUser($this->getUser());
            $timeStamp = $this->generateTimeStamp();
            $comment->setCreated($timeStamp);
            $comment->setUpdated($timeStamp);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();
        }

        return new Response('Comment saved sucessfully');
    }

    private function generateTimeStamp()
    {
        $dateAdded = date_create();
        return $dateAdded->format('Y-m-d h.i.s');
    }
}