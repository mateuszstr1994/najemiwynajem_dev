<?php

namespace App\Service\Entity;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractBaseEntityService
{
    protected $entityClass;
    protected $entity;
    protected $errors = [];
    protected $em;
   
    public function __construct(EntityManager $entityManager, ContainerInterface $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
        //$this->logger = $this->container->get('');
      
        if(empty($this->entityClass))
        {
           throw new \Exception("Missing entity class.");
        }
      
    }
   
    public function create() 
    {
        $this->setEntity(new $this->entityClass());
        return $this->entity;
    }
   
    public function save() 
    {
        if(!empty($this->entity))
        {
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
}

