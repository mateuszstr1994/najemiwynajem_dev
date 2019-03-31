<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class MenuItemAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
			->add('id')
                        ->add('name')
                        ->add('menu')
                        ->add('slug')
                        ->add('title')
                        ->add('title_attribute')
                        ->add('parent')
                        ->add('level')
                        ->add('position')
                        ->add('status')
                        ->add('class_attribute')
                        ->add('id_attribute')
                        ->add('icon')
			;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
			->add('id')
                        ->add('name')
                        ->add('menu')
                        ->add('slug')
                        ->add('title')
                        ->add('title_attribute')
                        ->add('status')
                        ->add('parent')
                        ->add('level')
                        ->add('position')
                        ->add('class_attribute')
                        ->add('id_attribute')
                        ->add('icon')
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
                        ->add('menu')
                        ->add('slug')
                        ->add('title')
                        ->add('title_attribute')
                        ->add('status')
                        ->add('parent')
                        ->add('level')
                        ->add('position')
                        ->add('class_attribute')
                        ->add('id_attribute')
                        ->add('icon')
                        
			;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
                        ->add('name')
                        ->add('menu')
                        ->add('slug')
                        ->add('title')
                        ->add('title_attribute')
                        ->add('parent')
                        ->add('status')
                        ->add('level')
                        ->add('position')
                        ->add('class_attribute')
                        ->add('id_attribute')
                        ->add('icon')
			;
    }
}
