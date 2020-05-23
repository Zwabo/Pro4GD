<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\News;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends AbstractController
{
  /*

    public function news()
    {
        $news = $this->getDoctrine()->getRepository('App:News')->findAll();

        return $this->render('news/index.html.twig', [
            'controller_name' => 'NewsController', 'news' => $news

        ]);
    }*/

    /**
     * @Route("api/news/{id}", name="article", methods={"GET"})
     */

    public function getArticle($id)
    {
        $article = $this->getDoctrine()->getRepository(News::Class)->findAll();
        //findOneBy(array('id' => $id));

        /*$article = $this->getDoctrine()
            ->getRepository(News::class)
            ->find($id);*/

        if (!$article) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($article->toAssoc(), Response::HTTP_OK);

        /*return $this->render('newsArticle.html.twig', [
            'controller_name' => 'NewsController', 'article' => $article
        ]);*/
    }
    /**
     * @Route("api/news", name="news")
     */

    public function index(){

        $articles = $this->getDoctrine()->getRepository(News::Class)->findAll();

        if (!$articles) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $news = [];
        foreach ($articles as $article) {
           // array_push($news, $article);
           $news[] = $article->toAssoc();
        }

        return new JsonResponse($news, Response::HTTP_OK);
    }
}
