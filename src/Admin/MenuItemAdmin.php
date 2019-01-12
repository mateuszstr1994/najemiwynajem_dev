<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use App\Entity\Main\Menu;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sonata\Form\Type\CollectionType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

final class MenuItemAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
			->add('id')
			->add('name')
			->add('alias')
			->add('url')
			->add('position')
			->add('description')
			->add('icon')
			->add('class')
			->add('columns')
			->add('col')
			->add('status')
			->add('displayedFor')
			;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
			->add('id')
                        ->add('menu.name')
			->add('name')
			->add('alias')
			->add('url')
			->add('position')
			->add('description')
			->add('icon')
			->add('class')
			->add('columns')
			->add('col')
			->add('status')
			->add('displayedFor')
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
			->add('alias')
			->add('url')
			->add('position')
			->add('description')
			->add('icon')
			->add('class')
			->add('columns')
			->add('col')
			->add('status')
			->add('displayedFor')
			;
            break;
            default:
                $formMapper
                    ->add('name',HiddenType::class,array('attr'=>array("hidden" => true)))
                    ->add('menu')
                    ->add('alias')
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
			->add('alias')
			->add('url')
			->add('position')
			->add('description')
			->add('icon')
			->add('class')
			->add('columns')
			->add('col')
			->add('status')
			->add('displayedFor')
			;
    }
   
}
