<?php

namespace App\Service;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Util\Debug;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class ValidationService{
    
    private $em;
    private $container;
    
    public function __construct(EntityManager $entityManager, ContainerInterface $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
       
    }
    
    public function validationPost(array $data, array $fields){
        foreach($data as $key => $value){
            if(isset($fields[$key]) && $fields[$key]){ 
                $this->validationSingleField($value, $fields[$key]);
            }
        }
        return array('status' => 'ok', 'errors' => 'fields');
    }
    
    private function validationSingleField(string $data, $fields){
        
        foreach($fields as $key => $value){
            if($key == 'minLength'){
                return 'Musze dać plik i numer błedu';
            }
        }
    }
    
    private function valiatorMinLength($data, $minLength){
        if(strlen($data) < $minLength )
            echo 'assaas';
    }
   
}