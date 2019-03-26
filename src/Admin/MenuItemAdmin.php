<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sonata\Form\Type\CollectionType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

final class MenuItemAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
			->add('id')
			->add('name')
			->add('slug')
			->add('url')
			->add('position')
			->add('description')
			->add('icon')
			->add('class')
			->add('status')
			->add('displayed_for')
			;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
			->add('id')
                        ->add('menu')
                        ->add('parent')
                        ->add('item_children')
			->add('name')
			->add('slug')
			->add('url')
			->add('position')
			->add('description')
			->add('icon')
			->add('class')
			->add('status')
			->add('displayed_for')
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
        switch($this->getRoot()->getClass()){
            case 'App\Entity\Main\MenuItem':
                $formMapper	
			->add('name')
                        ->add('menu')
                        ->add('parent')
//                        ->add('item_children', EntityType::class, [
//                            'class' => 'App\Entity\Main\MenuItem',
//                            'expanded' => false,
//                            'multiple' => true
//                        ])
			->add('slug')
			->add('url')
			->add('position')
			->add('description')
			->add('icon')
			->add('class')
			->add('status')
			->add('displayed_for')
			;
            break;
            default:
                $formMapper
                    ->add('name')
                    ->add('slug')
                    ->add('url')
                    ->add('position');
			
            break;
        }
        
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
            $showMapper
			->add('id')
			->add('name')
			->add('slug')
			->add('url')
			->add('position')
			->add('description')
			->add('icon')
			->add('class')
			->add('status')
			->add('displayedFor')
			;
    }
   
}
