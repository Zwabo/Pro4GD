<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\News;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;



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
     * @Security("is_granted('ROLE_ADMIN') and is_granted('ROLE_SUPPORT_USER')")
     */

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

        //Push notifications that new news-article has been released to all users
        $users = $this->getDoctrine()->getRepository(Product::class)->findAll();
        foreach ($users as $user) {
            $user->addNotification("Neuer News-Eintrag erschienen!", $news->getTitle());
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($news);
        $entityManager->flush();

        return new JsonResponse(Response::HTTP_OK);
    }

    /**
     * upload new plant file images
     * @Route("/api/uploadNewsFile/", name="uploadNewsFile", methods={"POST"})
     */
    public function uploadPlantImage(Request $request) : JsonResponse
    {
        $data = $request->getContent();
        $params = json_decode($data, true);

        $plantPicture = $params["iconElement"];
        $plantPictureName = $params["iconName"];
        $plantPictureName = md5(uniqid()).'.'.$plantPicture->guessExtension();

        $plantBackground = $params["windowIconElement"];
        $plantBackgroundName = $params["windowIconName"];
        $plantBackgroundName =md5(uniqid()).'.'.$plantBackground->guessExtension();

        $plantPicture->move(
        /*$this->getParameter('plantPictures_directory'),/*folder*/
            '.../public/images/plants',
            $plantPictureName/*pictureName*/
        );

        $plantBackground->move(
            '.../public/images/plants',
            $plantBackgroundName
        );

        $entityManager=getDoctrine()->getManager();

        return new JsonResponse([], Response::HTTP_OK);
    }

    /**
     * @Route("/api/{plantid}/addPlant/createNewPlant/addPicture", name="addPlantPicture")
     */
    public function addPlantPicture($plantid, Request $request) : JsonResponse {
        $picture = $request->getContent();                  // string
        //$picture = json_decode($picture, true);

        $extension = $picture->guessExtension();

        $plantPictures_directory = $this->getParameter('plantPictures_directory');

        $picture->move($plantPictures_directory, $picture);

    }


}
