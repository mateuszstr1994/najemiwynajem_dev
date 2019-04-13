<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\Form\Type\CollectionType;

final class TestAdmin extends AbstractAdmin
{

    public function prePersist($societate)
    {
        $this->preUpdate($societate);
        
    }

    public function preUpdate($societate)
    {
        $conturi = $societate->getChildren();
        if (count($conturi) > 0) {
            foreach ($conturi as $cont) {
                $cont->setParent($societate);
            }
        }
    }
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
			->add('id')
                        ->add('parent')
                        ->add('name')
			;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
			->add('id')
                        ->add('parent')
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
        $subject = $this->getSubject();
        
        if ($subject->getParent() != null) {
             $formMapper
                        ->add('name');
        } else {
        
            $formMapper            
                        ->add('name')
                        ->add('parent')
                        ->add('children', \Sonata\CoreBundle\Form\Type\CollectionType::class, array(
                            'label' => 'Menu items',
                            'by_reference' => false,
                            'type_options' => array('delete' => true)
                        ), array(
                            'edit' => 'inline',
            'inline' => 'table'
                            )
                        );
        }
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
                        
                        ->add('name')
                        ->add('parent')
			->add('id')
			;
    }
}
