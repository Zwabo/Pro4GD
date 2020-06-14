<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\News;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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
        $article = $this->getDoctrine()->getRepository(News::Class)->find($id);
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

    /**
     * @Route("/api/news/createNewsArticle", name="createNewsArticle", methods={"POST"})
     */
    public function createNewsArticle(Request $request, ValidatorInterface $validator): JsonResponse
    {
        $news = new News();

        $data = $request->getContent();
        $params = json_decode($data, true);

        $news->setTitle($params["title"]);
        $news->setShortText($params["shortText"]);
        $news->setLongText($params["long_text"]);
        $news->setDatePosted(new \DateTime("now"));

        $errors = $validator->validate($news);
        if(count($errors) > 0){
            return new JsonResponse((string) $errors, Response::HTTP_CONFLICT);
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($news);
        $entityManager->flush();

        return new JsonResponse(Response::HTTP_OK);
    }


}
