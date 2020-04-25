<?php

namespace App\Controller;
use App\Entity\Szkola;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListaSzkolController extends AbstractController
{
    /**
       * @Route("/szkoly", name="szkoly_lista")
       * @return \Symfony\Component\HttpFoundation\Response

     */
    public function szkoly()
    {
        /** @var Szkola[] $szkoly */
        $szkoly = $this->getDoctrine()->getRepository(Szkola::class)->findBy([], ['nazwaSzkoly' => 'ASC']);

        return $this->render('listaSzkol.html.twig', array('szkoly' => $szkoly));
    }
}
