<?php

namespace App\Block;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Block\BaseBlockService;

class AuthenticationMenuBlockService extends BaseBlockService
{
    public function getName()
    {
        return 'AuthenticationMenuBlockService';
    }
    
    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'url' => false,
            'title' => 'Authentication Menu',
            'template' => 'Block/Menu/authenticationMenu.html.twig',
            'block' => 'notLoggedIn',
        ));
    }
}