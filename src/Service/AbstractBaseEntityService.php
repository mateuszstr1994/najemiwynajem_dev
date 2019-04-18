<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Security;

abstract class AbstractBaseEntityService
{
    protected $entityClass;
    protected $entity;
    protected $errors = [];
    protected $em;
    private $user = null;
   
    public function __construct(EntityManager $entityManager, ContainerInterface $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
        if($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $this->user = $this->container->get('security.context')->getToken()->getUser();
        } 

        if(empty($this->entityClass))
        {
           throw new \Exception("Missing entity class.");
        }
      
    }
   
    public function create() 
    {
        $this->setEntity(new $this->entityClass());
        
        method_exists($this->entity, 'setCreatedBy') ? 
            $this->entity->setCreatedBy($this->user) : $this->entity->setCreatedBy(null);
        
        method_exists($this->entity, 'setCreatedAt') ? 
            $this->entity->setCreatedAt(new \DateTime('now')): '';
        
        return $this->entity;
    }
   
    public function save() 
    {
        if(!empty($this->entity))
        {
            if(method_exists($this->entity, 'getCreatedAt') && 
                method_exists($this->entity, 'setCreatedAt') && $this->entity->getCreatedAt() == null) 
                    $this->entity->setCreatedAt(new \DateTime('now'));
        
            method_exists($this->entity, 'setUpdateAt') ? 
                $this->entity->setUpdateAt(new \DateTime('now')): '';
            
            method_exists($this->entity, 'setUpdatedBy') ? 
                $this->entity->setUpdatedBy($this->user) : $this->entity->setUpdatedBy(null);
        
            $this->em->persist($this->entity);
            $this->em->flush();
        }
 
    }
    
    public function setEntity($entity)
    {
       if(!is_a($entity, $this->entityClass))
       {
           throw new \Exception("Setting invalid entity.  Expecting entity to be of type: ".$this->entityClass);
       }
       
        $this->entity = $entity; 
    }
    
    public function getErrors()
    {
       return $this->errors;
    }
}

