<?php

namespace App\Block\Sidebar;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Doctrine\Common\Util\Debug;


class SidebarMenuBlockService extends BaseSidebarBlockService
{  
    public function getName()
    {
        return 'Sidebar Menu Block';
    }
    
    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'url'      => false,
            'title'    => 'Menu',
            'template' => 'Block\Sidebar\block_sidebar_menu.html.twig',
            'alias' => 'Menu',
        ));
    }    
}