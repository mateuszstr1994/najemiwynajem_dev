<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Security;

abstract class AbstractBaseEntityService
{
    /**
     * @var
     */
    protected $entityClass;
    /**
     * @var
     */
    protected $entity;
    /**
     * @var array
     */
    protected $errors = [];
    /**
     * @var EntityManager
     */
    protected $em;
    /**
     * @var
     */
    protected $repository;
    /**
     * @var null
     */
    protected $user = null;

    /**
     * AbstractBaseEntityService constructor.
     * @param EntityManager $entityManager
     * @param ContainerInterface $container
     * @throws \Exception
     */
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

        $this->repository = $this->em->getRepository($this->entityClass);
      
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function create()
    {
        $this->setEntity(new $this->entityClass());
        
        method_exists($this->entity, 'setCreatedBy') ? 
            $this->entity->setCreatedBy($this->user) : $this->entity->setCreatedBy(null);
        
        method_exists($this->entity, 'setCreatedAt') ? 
            $this->entity->setCreatedAt(): '';
        
        return $this->entity;
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save($entity = null, $user = null)
    {
        if($entity != null) {
            $this->setEntity($entity);
        }

        if(!empty($this->entity))
        {
            if(method_exists($this->entity, 'getCreatedAt') && 
                method_exists($this->entity, 'setCreatedAt') && $this->entity->getCreatedAt() == null) 
                    $this->entity->setCreatedAt();
        
            method_exists($this->entity, 'setUpdateAt') ? 
                $this->entity->setUpdateAt(): '';

            if(method_exists($this->entity, 'setUpdatedBy')) {
                $this->entity->setUpdatedBy($user == null ? $this->user: $user);
            }

            $this->em->persist($this->entity);
            $this->em->flush();
        }
 
    }

    /**
     * @param $entity
     * @throws \Exception
     */
    public function setEntity($entity)
    {
       if(!is_a($entity, $this->entityClass))
       {
           throw new \Exception("Setting invalid entity.  Expecting entity to be of type: ".$this->entityClass);
       }
       
        $this->entity = $entity; 
    }

    /**
     * @return array
     */
    public function getErrors()
    {
       return $this->errors;
    }


    /**
     * @param array $array
     * @return mixed
     */
    public function findOneBy(array $array) {
        return $this->repository->findOneBy($array);
    }


}

