<?php

namespace App\Service;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Util\Debug;


class ValidationService{
    
    private $em;
    private $container;
    
    public function __construct(EntityManager $entityManager, ContainerInterface $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
       
    }
    
    public function validationPost(array $data, array $fields){
        
    }
    
    public function validationSingleField(string $data, $field){
        
    }
   
}