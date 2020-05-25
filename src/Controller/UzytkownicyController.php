<?php


namespace App\Controller;
use App\Entity\Umiejetnosci;
use App\Entity\Uzytkownik;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UzytkownicyController extends AbstractController
{
    /**
     * @Route("/users", name="users_page")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {

        /** @var Uzytkownik[] $users */
        $users = $this->getDoctrine()->getRepository(Uzytkownik::class)->findAll();

        /** @var Umiejetnosci[] $umiejetnosci */
        $umiejetnosci = $this->getDoctrine()->getRepository(Umiejetnosci::class)->findBy([], ['nazwa_umiejetnosci' => 'ASC']);


        return $this->render("uzytkownicy.html.twig", array('users' => $users, 'umiejetnosci' => $umiejetnosci));
    }

}