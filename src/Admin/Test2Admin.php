<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;

final class Test2Admin extends AbstractAdmin
{
 
    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
     
        $admin = $this->isChild() ? $this->getParent() : $this;
        $id = $admin->getRequest()->get('id');

        $menu->addChild('View Playlist', [
            'uri' => $admin->generateUrl('admin.test3.list', ['id' => $id])
        ]);
        
        if($admin->getRequest()->get('childId')) {
                 $menu->addChild(
        'Loans',
            array('uri' => $this->getChild('admin.test3')->generateUrl('admin.test4.list', array('id' => $admin->getRequest()->get('childId'))))
    );
        }

    }
    
    public function prePersist($societate)
    {
        $this->preUpdate($societate);
        
    }

    public function preUpdate($societate)
    {
        $conturi = $societate->getTest3();
        if (count($conturi) > 0) {
            foreach ($conturi as $cont) {
                $cont->setTest2($societate);
            }
        }
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
			->add('id')
			->add('name')
			;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
			->add('id')
			->add('name')
			->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
			->add('name')
                        ->add('test3', ModelType::class,array(
                            'by_reference' => false, 
                            'multiple' => true))
			;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
			->add('id')
			->add('name')
			;
    }
}
