<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Tipps;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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


}
