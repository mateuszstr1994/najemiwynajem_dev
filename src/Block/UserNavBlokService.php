<?php

namespace App\Block;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Block\BaseBlockService;

class UserNavBlokService extends BaseBlockService
{
    public function getName()
    {
        return 'Rss Reader';
    }
    
    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'url'      => false,
            'title'    => 'User Navigation',
           
            'template' => 'App/NIW/Resources/views/Block/test.html.twig',
        ));
    }
    
     public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        

       return new Response(
            '<html><body>Lucky number: </body></html>'
        );
    }
}