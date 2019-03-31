<?php

namespace App\Block;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Block\BaseBlockService;
use App\Entity\Main\Menu;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use App\Block\MenuBlockService;

class UserAuthenticatedMenuBlockService extends MenuBlockService
{
    protected $container;
    protected $em;
    
    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'url'      => false,
            'title'    => 'Menu',
            'template' => 'Block\Menu\userAuthenticatedMenu.html.twig',
            'alias' => 'user_authenticated_menu'
        ));
    }
    
    public function getName()
    {
        return 'User Authenticated Menu';
    }
}