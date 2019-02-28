<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePageController extends AbstractController
{

    public function index(\Swift_Mailer $mailer)
    {   
        return $this->render('base.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
