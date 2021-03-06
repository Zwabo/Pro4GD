<?php
/**
 * Created by PhpStorm.
 * User: Verena
 * Date: 20.05.2020
 * Time: 15:04
 */

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Thread;
use App\Entity\ThumbUp;
use App\Entity\ThumbUpThread;
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
     * @Route("/api/threads")
     */
    public function fetchAllThreads(Request $request)
    {
        $content = json_decode($request->getContent());
        $loggedInUserId = $content->userId;

        $entityManager = $this->getDoctrine()->getManager();
        /** @var Thread[] $threads */
        $threads = $entityManager->getRepository(Thread::class)->findAll();

        $rThread = [];
        foreach ($threads as $thread) {
            $comments = $entityManager->getRepository(Comment::class)->findBy(['thread' => $thread->getId()]);
            $likes = $entityManager->getRepository(ThumbUpThread::class)->findBy(['thread' => $thread->getId()]);

            $isThreadLiked = false;

            foreach ($likes as $like) {
                /** @var ThumbUpThread $like */
                if ($loggedInUserId == $like->getUser()->getId()) {
                    $isThreadLiked = true;
                    break;
                }
            }

            $rThread[] = [
                'headline' => $thread->getHeadline(),
                'id' => $thread->getId(),
                'userPic' => $thread->getUser()->getUserPic(),
                'created' => $thread->getCreated()->format('d.m.Y, G:i'),
                'postsMade' => count($comments),
                'category' => $this->formatCategory($thread->getCategory()),
                'likes' => count($likes),
                'isLiked' => $isThreadLiked,
            ];
        }

        return new JsonResponse($rThread);
    }

    /**
     * @Route("/api/forum/categories")
     */
    public function fetchCategories()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $categories = $entityManager->getRepository(Category::class)->findAll();


        $rCategories = [];

        foreach ($categories as $category) {
            $rCategories[] = $category->toAssoc();
        }

        return new JsonResponse($rCategories, Response::HTTP_OK);
    }

    /**
     * @Route("/api/thread/{id}")
     */
    public function fetchThreadById(Request $request, string $id)
    {
        $content = json_decode($request->getContent());
        $loggedInUserId = $content->userId;
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Thread[] $threads */
        $thread = $entityManager->getRepository(Thread::class)->find($id);

        $comments = $entityManager->getRepository(Comment::class)->findBy(['thread' => $id]);
        $likes = $entityManager->getRepository(ThumbUpThread::class)->findBy(['thread' => $id]);

        /** @var User $user */
        $user = $thread->getUser();

        $isThreadLiked = false;
        foreach ($likes as $like) {
            /** @var ThumbUp $like */
            if ($loggedInUserId == $like->getUser()->getId()) {
                $isThreadLiked = true;
                break;
            }
        }

        $rThread = [
            [
                'headline' => $thread->getHeadline(),
                'text' => $thread->getInputtext(),
                'id' => $thread->getId(),
                'created' => $thread->getCreated()->format('d.m.Y, G:i') ,
                'username' => $user->getFirstName(). ' ' . $user->getLastName(),
                'userPic' => $user->getUserPic(),
                'category' => $this->formatCategory($thread->getCategory()),
                'likes' => count($likes),
                'isLiked' => $isThreadLiked,
            ]
        ];

        /** @var Comment $comment */
        foreach ($comments as $comment) {
            $commentLikes =
                $entityManager->getRepository(ThumbUp::class)->findBy(['Comment' => $comment->getId()]);

            $isLiked = false;

            foreach ($commentLikes as $like) {
                /** @var ThumbUp $like */
                if ($loggedInUserId == $like->getUser()->getId()) {
                    $isLiked = true;
                }
            }

            $rThread[] = [
                'id' => $comment->getId(),
                'text' => $comment->getText(),
                'created' => $comment->getCreated()->format('d.m.Y, G:i'),
                'username' => $comment->getUser()->getFirstName() . ' ' . $comment->getUser()->getLastName(),
                'userPic' => $user->getUserPic(),
                'likes' => count($commentLikes),
                'isLiked' => $isLiked
            ];
        }

        return new JsonResponse($rThread);
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
            return new JsonResponse('User not found', Response::HTTP_NOT_FOUND);
        }

        $category = $entityManager->getRepository(Category::class)->find($content->categoryId);
        if (!$category) {
            return new JsonResponse('Category not found', Response::HTTP_NOT_FOUND);
        }

        $thread->setHeadline($content->headline);
        $thread->setInputtext($content->text);
        $thread->setUser($user);
        $thread->setCreated(new \DateTime());
        $thread->setUpdated(new \DateTime());
        $thread->setCategory($category);

        $user->setXP($user->getXP() + 5);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($thread);
        $entityManager->persist($user);
        $entityManager->flush();

        return new JsonResponse($thread->toAssoc(), Response::HTTP_OK);
    }

    /**
     * @Route("/forum/addcomment", name="addcomment", methods={"POST"})
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

        $user->setXP($user->getXP() + 3);

        $entityManager->persist($comment);
        $entityManager->persist($user);
        $entityManager->flush();

        $rComment = [
            'id' => $comment->getId(),
            'text' => $comment->getText(),
            'created' => $comment->getCreated()->format('d.m.Y, G:i'),
            'username' => $comment->getUser()->getFirstName() . ' ' . $comment->getUser()->getLastName(),
            'userPic' => $user->getUserPic(),
            'likes' => 0,
            'isLiked' => false
        ];

        return new JsonResponse($rComment, Response::HTTP_OK);
    }

    /**
     * @Route("/forum/addLike/{id}")
     *
     * @param string $id the comment id given by the vue form
     */
    public function addLike(Request $request, string $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $content = json_decode($request->getContent());
        $user = $entityManager->getRepository(User::class)->find($content->userId);
        $comment = $entityManager->getRepository(Comment::class)->find($id);

        $thumbUp = new ThumbUp();
        $thumbUp->setUser($user);
        $thumbUp->setComment($comment);

        $user->setXP($user->getXP() + 1);

        $entityManager->persist($thumbUp);
        $entityManager->persist($user);
        $entityManager->flush();
        return new JsonResponse('Liked', Response::HTTP_OK);
    }

    /**
     * @Route("/forum/removeLike/{id}")
     *
     * @param string $id the comment id given by the vue form
     */
    public function removeLike(Request $request, string $id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $content = json_decode($request->getContent());

        $user = $entityManager->getRepository(User::class)->find($content->userId);
        $thumbUp = $entityManager
                ->getRepository(ThumbUp::class)
                ->findOneBy(
                    ['Comment' => $id, 'user' => $user->getId()]
                );

        if (!$thumbUp) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $user->setXP($user->getXP() - 1);

        $entityManager->remove($thumbUp);
        $entityManager->persist($user);
        $entityManager->flush();
        return new JsonResponse([], Response::HTTP_OK);
    }

    /**
     * @Route("/forum/likedStatus/{threadid}", name="likedStatus", methods={"POST"})
     */
    public function likedStatus($threadid, Request $request) : JsonResponse
    {
        $data = $request->getContent();
        $data = json_decode($data, true);
        $userid = $data["userId"];

        $liked = null;

        $thread = $this->getDoctrine()
            ->getRepository(ThumbUpThread::class)
            ->findOneBy(
                ['thread' => $threadid, 'user' => $userid]
            );

        if (!$thread) {
            $liked = false;
        } else {
            $liked = true;
        }

        return new JsonResponse($liked, Response::HTTP_OK);
    }

    /**
     * @Route("/forum/commentsLikedStatus/{threadid}", name="commentsLikedStatus", methods={"POST"})
     */
    public function commentsLikedStatus($threadid, Request $request) : JsonResponse
    {
        $data = $request->getContent();
        $data = json_decode($data, true);
        $userId = $data["userId"];

        //find all comments from the specific thread
        $threadComments = $this->getDoctrine()
            ->getRepository(Comment::class)
            ->findBy(["thread" => $threadid]);

        $commentIds = [];
        foreach($threadComments as $comment) {
            $liked = $this->getDoctrine()
                ->getRepository(ThumbUp::class)
                ->findOneBy(["Comment" => $comment->getId(), 'user' => $userId]);
            if (!empty($liked)) {
                $commentIds[] = $comment->getId();
            }
        }

        return new JsonResponse($commentIds, Response::HTTP_OK);
    }


    /**
     * @Route("/api/forum/addThreadLike/{id}", name = "addThreadLike", methods="POST")
     *
     * @param string $id the thread id given by the vue form
     */
    public function addThreadLike(Request $request, string $id) : JsonResponse
    {
        $entityManager = $this->getDoctrine()->getManager();
        $content = json_decode($request->getContent());

        $user = $entityManager->getRepository(User::class)->find($content->userId);
        $thread = $entityManager->getRepository(Thread::class)->find($id);

        $thumbUpThread = new ThumbUpThread();
        $thumbUpThread->setUser($user);
        $thumbUpThread->setThread($thread);

        $user->setXP($user->getXP() + 1);

        $entityManager->persist($thumbUpThread);
        $entityManager->persist($user);
        $entityManager->flush();
        return new JsonResponse([], Response::HTTP_OK);
    }

    /**
     * @Route("/api/forum/removeThreadLike/{id}", name = "removeThreadLIke", methods="POST")
     */
    public function removeThreadLike(Request $request, string $id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $content = json_decode($request->getContent());

        $user = $entityManager->getRepository(User::class)->find($content->userId);
        $thumbUpThread = $entityManager
            ->getRepository(ThumbUpThread::class)
            ->findOneBy(
                ['thread' => $id, 'user' => $user->getId()]
            );

        if (!$thumbUpThread) {
            return new JsonResponse($thumbUpThread->toAssoc(), Response::HTTP_NOT_FOUND);
        }

        $user->setXP($user->getXP() - 1);

        $entityManager->persist($user);
        $entityManager->remove($thumbUpThread);
        $entityManager->flush();
        return new JsonResponse([], Response::HTTP_OK);
    }

    /**
     * @Route("api/forum/removeThread/{id}")
     *
     */
    public function removeThread(Request $request, string $id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $content = json_decode($request->getContent());

        $user = $entityManager->getRepository(User::class)->find($content->userId);
        $thread = $entityManager
            ->getRepository(Thread::class)
            ->findOneBy(
                ['thread' => $id, 'user' => $user->getId()]
            );

        if (!$thread) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $user->setXP($user->getXP() - 1);

        $entityManager->persist($user);
        $entityManager->remove($thread);
        $entityManager->flush();
        return new JsonResponse([], Response::HTTP_OK);
    }

    private function generateTimeStamp()
    {
        $dateAdded = date_create();
        return $dateAdded->format('Y-m-d h.i.s');
    }

    private function formatCategory($category)
    {
        $categoryString = $category->toAssoc();
        if ($categoryString['parent'] !== '') {
            $parent = $this->getParentCategory($category);
            $categoryString['parent'] = $this->formatCategory($parent);//$parent === null ? $this->formatCategory($parent) : null;
        }
        return $categoryString;
    }

    private function getParentCategory($category)
    {
        if ($category->getParent() === null) {
            return null;
        }
        return $this->getDoctrine()
            ->getRepository(Category::class)
            ->findOneBy( ['title' => $category->getParent()]);
    }
}