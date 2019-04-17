<?php

namespace App\Service\Entity;
use App\Entity\EmailItem;
use App\Application\Sonata\UserBundle\Entity\User;
use App\Entity\EmailTemplate;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class EmailItemService 
{
    protected $entityClass = EmailItem::class;
    protected $em;
    protected $entity;
    
     public function __construct(EntityManager $entityManager, ContainerInterface $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
        
      
    }
    
    function create($user = null) {
        
        $EmailItem = new EmailItem();
        return $EmailItem;
        
    }
    
    function save($EmailItem) {
                
        $this->em->persist($EmailItem);
        $this->em->flush();
    }
    
    
    
}



