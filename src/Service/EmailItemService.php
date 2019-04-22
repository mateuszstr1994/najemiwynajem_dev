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

    public function create(string $template = null, array $data = [], User $user = null) {

        parent::create();

        $emailTemplate = $this->container->get('app.email_template.service')->findOneBy(array('name' => $template));

        if($emailTemplate == null) {
        } else {
            $this->entity->setTemplate($emailTemplate);
        }

        if(count($data) > 0 ){
            $this->entity->setData($data);
        }
        $this->entity->setRecipient($user);
        $this->entity->setCreatedBy($user);
        //$this->entity->setUpdateBy($user) in AbstractBaseEntityService;
    }
    
}
