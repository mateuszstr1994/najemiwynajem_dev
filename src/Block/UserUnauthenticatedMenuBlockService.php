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

class UserUnauthenticatedMenuBlockService extends MenuBlockService
{
    protected $container;
    protected $em;
    
    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'url'      => false,
            'title'    => 'Menu',
            'template' => 'Block\Menu\userUnauthenticatedMenu.html.twig',
            'alias' => 'user_unauthenticated_menu'
        ));
    }
    
    public function getName()
    {
        return 'User Unauthenticated Menu';
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
        $repoMenuItem = $this->em->getRepository('App\Entity\Main\MenuItem');
        
        $menu = $repositoryMenu->findOneBy(array("alias" => $settings['alias'], "status" => 1));
        $menuItemsRoot = $repoMenuItem->findOneBy(array('parent' => null, 'menu' => $menu));
        
        $arrayMenuItemTree = $repoMenuItem->childrenHierarchy( 
            null, /* starting from root nodes */  
            true, /* true: load all children, false: only direct */
            array(
        'decorate' => false,
        'childSort' => array('field' => 'position', 'dir' => 'asc')));

        return $this->renderResponse($blockContext->getTemplate(), array(
            'block'     => $blockContext->getBlock(),
            'settings'  => $settings,
            'arrayMenuItemTree' => $arrayMenuItemTree
        ), $response);
        
    }
    
    
}