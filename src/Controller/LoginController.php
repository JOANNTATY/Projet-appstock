<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render(view: 'login/index.html.twig',);
    }
    #[Route('/login',name:'login')]
    public function login(){
        return $this->render(view:'login/index.html.twig');
    }

#[Route('/logon',name:'logon')]
public function logon(){
    return $this->redirectToRoute('accueil');
}
   

    #return  $this->redirectToRoute('');
}
