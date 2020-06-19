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
use App\Entity\User;
use App\Form\CommentForm;
use App\Form\ThreadForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
     * @Route("/api/threads")
     */
    public function fetchAllThreads(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Thread[] $threads */
        $threads = $entityManager->getRepository(Thread::class)->findAll();

        $rThread = [];
        foreach ($threads as $thread) {

            $userId = $thread->getUser();

            $comments = $entityManager->getRepository(Comment::class)->findBy(['thread' => $thread->getId()]);

            $rThread[] = [
                $thread->getHeadline(),
                $thread->getId(),
                $thread->getUser()->getUserPic(),
                $thread->getCreated()->format('d.m.Y, G:i'),
                count($comments)
            ];
        }

        return new JsonResponse($rThread);
    }


    /**
     * @Route("/api/thread/{id}")
     */
    public function fetchThreadById(Request $request, string $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Thread[] $threads */
        $thread = $entityManager->getRepository(Thread::class)->find($id);

        $comments = $entityManager->getRepository(Comment::class)->findBy(['thread' => $id]);




        /** @var User $user */
        $user = $thread->getUser();
        $rThread = [[$thread->getHeadline(), $thread->getInputtext(), $thread->getId(),$thread->getCreated()->format('d.m.Y, G:i') , $user->getFirstName(). ' ' . $user->getLastName(), $user->getUserPic()]];
        /** @var Comment $comment */
        foreach ($comments as $comment) {
            $rThread[] = [$comment->getId(), $comment->getText(), $comment->getCreated()->format('d.m.Y, G:i'), $comment->getUser()->getFirstName() . ' ' . $comment->getUser()->getLastName(), $user->getUserPic()];
        }

        return new JsonResponse($rThread);
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
 * @Route("/forum/addthread")
 */
    public function addThread(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $content = json_decode($request->getContent());

        $thread = new Thread();

        $thread->setHeadline($content->headline);
        $thread->setInputtext($content->text);
        $thread->setUser($this->getUser());
        $thread->setCreated(new \DateTime());
        $thread->setUpdated(new \DateTime());
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($thread);
        $entityManager->flush();


        return new Response('Thread erstellt');
    }



    /**
     * @Route("/forum/addcomment")
     */
    public function addComment(Request $request)
    {
        return new Response('FOO');

        $entityManager = $this->getDoctrine()->getManager();

        $content = json_decode($request->getContent());
        $comment = new Comment();
        $comment->setText($content->comment);
        $thread = $entityManager->getRepository(Thread::class)->find($content->threadId);
        $comment->setThread($thread);
        $comment->setText($content->comment);
        $comment->setUser($this->getUser());
        $comment->setCreated(new \DateTime());
        $comment->setUpdated(new \DateTime());
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($comment);
        $entityManager->flush();

        return new Response('Kommentar erstellt');
    }


    private function generateTimeStamp()
    {
        $dateAdded = date_create();
        return $dateAdded->format('Y-m-d h.i.s');
    }
}