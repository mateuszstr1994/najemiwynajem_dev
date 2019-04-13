<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePageController extends BaseController
{

    public function index()
    {   
        
        $this->get('app.email.service');
        
        return $this->render('base.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
