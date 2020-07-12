<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Tipps;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TippsController extends AbstractController
{
    /*
      public function index()
      {
          return $this->render('tipps/index.html.twig', [
              'controller_name' => 'TippsController',
          ]);
      }
      */

    /**
     * @Route("api/tipps/{id}", name="tipp", methods={"GET"})
     */

    public function getTipp($id)
    {
        $tipp = $this->getDoctrine()->getRepository(Tipps::Class)->find($id);
        //findOneBy(array('id' => $id));

        /*$article = $this->getDoctrine()
            ->getRepository(News::class)
            ->find($id);*/

        if (!$tipp) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($tipp->toAssoc(), Response::HTTP_OK);

        /*return $this->render('newsArticle.html.twig', [
            'controller_name' => 'NewsController', 'article' => $article
        ]);*/
    }
    /**
     * @Route("api/tipps", name="tipps")
     */
    public function index(){

        $tipps = $this->getDoctrine()->getRepository(Tipps::Class)->findAll();

        if (!$tipps) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        $tippsSite = [];
        foreach ($tipps as $tipp) {
            $tippsSite[] = $tipp->toAssoc();
        }

        return new JsonResponse($tippsSite, Response::HTTP_OK);
    }

    /**
     * @Route("/api/tipps/createTippsArticle", name="createTippsArticle", methods={"POST"})
     */
    public function createTippsArticle(Request $request, ValidatorInterface $validator): JsonResponse
    {
       $tipps = new Tipps();

        $data = $request->getContent();
        $params = json_decode($data, true);

        $tipps->setTitle($params["title"]);
        $tipps->setShortText($params["shortText"]);
        $tipps->setLongText($params["long_text"]);
        $tipps->setDatePosted(new \DateTime("now"));

        $errors = $validator->validate($tipps);
        if(count($errors) > 0){
            return new JsonResponse((string) $errors, Response::HTTP_CONFLICT);
        }

        //Push notifications that new news-article has been released to all users
        $users = $this->getDoctrine()->getRepository(Product::class)->findAll();
        foreach ($users as $user) {
            $user->addNotification("Neuer Tips-Eintrag erschienen!", $tipps->getTitle());
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($tipps);
        $entityManager->flush();

        return new JsonResponse(Response::HTTP_OK);
    }

}
