<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Sonata\CoreBundle\Validator\ErrorElement;
use Symfony\Component\Validator\Constraints as Assert;

use Sonata\Form\Type\DatePickerType;
use Sonata\Form\Type\DateTimePickerType;

final class MenuAdmin extends AbstractAdmin
{   
     public function getNewInstance()
    {   // ustawia mi wartosci
        // Uruchamia się tylko kiedy jest tworony nowy obiekt, nie edycja
        $instance = parent::getNewInstance();
        $instance->setCreateDate(new \DateTime());
        $instance->setUpdateDate(new \DateTime());
       
        return $instance;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        
        /*foreach($object->getItems() as $item){
           if($item->getName() == 'test5'){
               $custom_error = 'Header nie mozna równać się test5';
            $errorElement->with( 'items' )->addViolation( $custom_error )->end();
           }
        }
         */
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
			->add('name')
			->add('createDate')
			->add('updateDate')
			->add('status')
			;
    }
    
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
			->add('id')
			->add('name')
			->add('alias')
                        ->add('country')
			->add('class')
			->add('position')
			->add('createDate')
			->add('updateDate')
			->add('status')
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
            ->add('alias')
            ->add('country',ModelAutocompleteType::class, array( 'property' => 'name'))
            ->add('position')
            ->add('status', null, array('label' => 'active'))
            ->add('class')
            ->add('items', \Sonata\CoreBundle\Form\Type\CollectionType::class, array(
                'label' => 'Menu items',
                'by_reference' => true,
                'type_options' => array('delete' => true)
            ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'position',
                )
            )
            ->add('createDate',DateTimePickerType::class, array(
              'format' => 'dd/MM/yyyy HH:mm',
              'widget' => 'single_text',
              'label' => 'Created date',
                ));
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
			->add('id')
			->add('name')
			->add('alias')
			->add('class')
			->add('position')
			->add('createDate')
			->add('updateDate')
			->add('status')
			;
    }
}
