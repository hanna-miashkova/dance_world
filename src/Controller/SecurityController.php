<?php

namespace App\Controller;

use App\Entity\Uzytkownik;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/register", name="app_register")
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {

       if($request->isMethod(Request::METHOD_POST)){
           try {
               $user = new Uzytkownik();
               $user->setImie($request->get('name'));
               $user->setNazwaUzytkownika($request->get('login'));
               $user->setHaslo($request->get('password'));
               $user->setEmail($request->get('email'));
               $user->setInfo($request->get('about'));
               $user->setPlec($request->get('gender'));
               $user->setZdjecie($request->get('photo'));
               $em = $this->getDoctrine()->getManager();
               $em->persist($user);
               $em->flush();

               $this->addFlash('welcome', 'Dziękujemy za rejestrację! Możesz się teraz zalogować ;) ');
               return $this->redirectToRoute('start_page');

           }catch(UniqueConstraintViolationException $ex){
               $this->addFlash('error', 'Już istnieje taki użytkownik!');
           }
       }

        return $this->render('security/register.html.twig');
    }
}
