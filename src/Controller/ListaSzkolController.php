<?php

namespace App\Controller;
use App\Entity\Szkola;
use App\Entity\Miasto;
use App\Entity\Umiejetnosci;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ListaSzkolController extends AbstractController
{
    /**
       * @Route("/szkoly", name="szkoly_lista")
       * @return \Symfony\Component\HttpFoundation\Response

     */
    public function szkoly(Request $request)
    {
        $wybrane_miasto = $request->query->get('miasto');
        if(isset($wybrane_miasto)){
            /** @var Szkola[] $szkoly */
            $szkoly = $this->getDoctrine()->getRepository(Szkola::class)->findBy(['miastoSzkoly'=> $wybrane_miasto]);
        }else{
            /** @var Szkola[] $szkoly */
            $szkoly = $this->getDoctrine()->getRepository(Szkola::class)->findAll();
        }

        $wybrana_nazwa = $request->query->get('nazwa');
        if(isset($wybrana_nazwa)) {
            $szkoly = $this->getDoctrine()->getRepository(Szkola::class)->findBy(['nazwaSzkoly' => $wybrana_nazwa]);
        }

        /** @var Miasto[] $miasta */
        $miasta = $this->getDoctrine()->getRepository(Miasto::class)->findBy([], ['nazwaMiasta' => 'ASC']);

        /** @var Umiejetnosci[] $kategorie */
        $kategorie = $this->getDoctrine()->getRepository(Umiejetnosci::class)->findBy([], ['nazwa_umiejetnosci' => 'ASC']);

        return $this->render('listaSzkol.html.twig', array('szkoly' => $szkoly, 'miasta' => $miasta, 'kategorie' => $kategorie, 'wybrane_miasto'=>$wybrane_miasto));
    }
}
