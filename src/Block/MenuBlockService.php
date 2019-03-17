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


class MenuBlockService extends BaseBlockService
{
    protected $container;
    protected $em;
    
    public function __construct($name, EngineInterface $templating, ContainerInterface $container )
    {
        parent::__construct($name, $templating);
        $this->container = $container;
        $this->em = $this->container->get('doctrine')->getEntityManager();
    }
    
    public function getName()
    {
        return 'Menu Block';
    }
    
    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'url'      => false,
            'title'    => 'Menu',
            'template' => 'empty',
            'position' => 1,
        ));
    }
    
    
    /**
     * The block context knows the default settings, but they can be
     * overwritten in the call to render the block.
     */
    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        $block = $blockContext->getBlock();
        if (!$block->getEnabled()) {
            return new Response();
        }
        
        $settings = $blockContext->getSettings();
        
        $repositoryMenu = $this->em->getRepository(Menu::class);
        $menu =  $repositoryMenu->findOneBy(array("position" => $settings['position'], "status" => 1));

        return $this->renderResponse($blockContext->getTemplate(), array(
            'block'     => $blockContext->getBlock(),
            'settings'  => $settings,
            'menu' => $menu,
        ), $response);
        
    }
    
}