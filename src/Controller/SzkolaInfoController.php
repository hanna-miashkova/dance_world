<?php


namespace App\Controller;


use App\Entity\Szkola;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SzkolaInfoController extends AbstractController
{
    /**
     * @Route("/szkolaInfo/{id}", name="szkola_info")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function szkolaInfo($id){

        $em = $this->getDoctrine()->getManager();
        /** @var Szkola $szkola */
        $szkola = $em->getRepository(Szkola::class)->find($id);
        return $this->render("szkolaInfo.html.twig", ['szkola' => $szkola]);

    }

}