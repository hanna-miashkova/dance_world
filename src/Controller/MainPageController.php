<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainPageController extends AbstractController
{
    /**
     * @Route("/", name="start_page")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        return $this->render("onas.html.twig");
    }

    /**
     * @Route("/info", name="info_page")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function info()
    {
        return $this->render("onas.html.twig");
    }
}