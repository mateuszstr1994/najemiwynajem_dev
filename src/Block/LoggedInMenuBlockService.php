<?php

namespace App\Block;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Block\BaseBlockService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use App\Block\MenuBlockService;

class LoggedInMenuBlockService extends MenuBlockService
{
    
    public function getName()
    {
        return 'LoggedInMenuBlockService';
    }
    
    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {   
        parent::setDefaultSettings($resolver);
        
        $resolver->setDefaults(array(
            'title'    => 'Authentication Menu',
            'template' => 'Block/Menu/loggedInMenu.html.twig',
            'block' => 'loggedInMenu',
        ));

    }
    
}