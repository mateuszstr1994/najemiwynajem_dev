<?php

namespace App\Service;
use App\Entity\EmailItem;
use App\Application\Sonata\UserBundle\Entity\User;
use App\Entity\EmailTemplate;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use App\Service\AbstractBaseEntityService;

class EmailItemService extends AbstractBaseEntityService
{
    protected $entityClass = EmailItem::class;
    protected $em;
    protected $entity;
    
    public function __construct(EntityManager $entityManager, ContainerInterface $container)
    {
      parent::__construct($entityManager, $container);

    }
    
}
