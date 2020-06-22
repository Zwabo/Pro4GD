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
            $comment->setLikes(0);

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
                'headline' => $thread->getHeadline(),
                'id' => $thread->getId(),
                'userPic' => $thread->getUser()->getUserPic(),
                'created' => $thread->getCreated()->format('d.m.Y, G:i'),
                'postsMade' => count($comments),
                'category' => $thread->getCategory(),
                'likes' => $thread->getLikes()
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

        $rThread = [
            [
                'headline' => $thread->getHeadline(),
                'text' => $thread->getInputtext(),
                'id' => $thread->getId(),
                'created' => $thread->getCreated()->format('d.m.Y, G:i') ,
                'username' => $user->getFirstName(). ' ' . $user->getLastName(),
                'userPic' => $user->getUserPic(),
                'category' => $thread->getCategory(),
                'likes' => $thread->getLikes()
            ]
        ];
        /** @var Comment $comment */
        foreach ($comments as $comment) {
            $rThread[] = [
                'id' => $comment->getId(),
                'text' => $comment->getText(),
                'created' => $comment->getCreated()->format('d.m.Y, G:i'),
                'username' => $comment->getUser()->getFirstName() . ' ' . $comment->getUser()->getLastName(),
                'userPic' => $user->getUserPic(),
                'likes' => $comment->getLikes()];
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
            $thread->setLikes(0);
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

        $user = $entityManager->getRepository(User::class)->find($content->userId);

        if (!$user) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $thread->setHeadline($content->headline);
        $thread->setInputtext($content->text);
        $thread->setUser($user);
        $thread->setCreated(new \DateTime());
        $thread->setUpdated(new \DateTime());
        $thread->setCategory($content->category);
        $thread->setLikes(0);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($thread);
        $entityManager->flush();

        return new JsonResponse($thread->toAssoc(), Response::HTTP_OK);

        //return new Response('Thread erstellt');
    }

    /**
     * @Route("/forum/addcomment")
     */
    public function addComment(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $content = json_decode($request->getContent());

        $comment = new Comment();

        $comment->setText($content->comment);

        $thread = $entityManager->getRepository(Thread::class)->find($content->threadId);
        if (!$thread) {
            return new JsonResonse([], Response::HTTP_NOT_FOUND);
        }

        $user = $entityManager->getRepository(User::class)->find($content->userId);
        if (!$user) {
            return new JsonResponsen([], Response::HTTP_NOT_FOUND);
        }

        $comment->setThread($thread);
        $comment->setText($content->comment);
        $comment->setUser($user);
        $comment->setCreated(new \DateTime());
        $comment->setUpdated(new \DateTime());
        $comment->setLikes(0);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($comment);
        $entityManager->flush();

        return new JsonResponse($thread->toAssoc(), Response::HTTP_OK);

        //return new Response('Kommentar erstellt');
    }


    private function generateTimeStamp()
    {
        $dateAdded = date_create();
        return $dateAdded->format('Y-m-d h.i.s');
    }
}