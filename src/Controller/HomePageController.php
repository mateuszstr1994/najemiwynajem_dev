<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePageController extends BaseController
{

    public function index()
    {   
        
        
        return $this->render('base.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
