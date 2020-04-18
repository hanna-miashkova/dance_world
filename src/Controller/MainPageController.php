<?php


namespace App\Controller;

use App\Entity\Umiejetnosci;
use App\Entity\Uzytkownik;
use Doctrine\ORM\Mapping\Entity;
use http\Env\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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

    /**
     * @Route("/profil", name="info_profil")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function infoProfil(\Symfony\Component\HttpFoundation\Request $request)
    {
        /** @var Uzytkownik $user */
        $user=$this->getUser();
        $form=$this->createFormBuilder($user)
            ->add('umiejetnosci',EntityType::class,[
                'choice_label'=>'nazwa_umiejetnosci',
                'class'=>Umiejetnosci::class ,
                'expanded'=>true,
                'multiple'=>true])->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->render("profil.html.twig",['form'=>$form->createView()]);
    }
}