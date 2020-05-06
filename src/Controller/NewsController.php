<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/news", name="news")
     */

    public function news()
    {
        $news = $this->getDoctrine()->getRepository('App:News')->findAll();

        return $this->render('news/index.html.twig', [
            'controller_name' => 'NewsController', 'news' => $news

        ]);
    }

    /**
     * @Route("/news/{id}", name="article")
     */
    public function index($id)
    {
        $article = $this->getDoctrine()->getRepository('App:News')->findOneBy(array('id' => $id));

        /*$article = $this->getDoctrine()
            ->getRepository(News::class)
            ->find($id);*/

        if (!$article) {
            throw $this->createNotFoundException(
                'No article found for id ' . $id
            );
        }

        return $this->render('newsArticle.html.twig', [
            'controller_name' => 'NewsController', 'article' => $article
        ]);
    }


    /**
     * @Route("/news/{id}", name="article")
     */

    public function showArticle($id)
    {


        return $this->render('newsArticle.html.twig', [
            'controller_name' => 'NewsController',

        ]);
    }
}
