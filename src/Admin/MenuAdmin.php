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
        $instance->setCreatedAt(new \DateTime());
        $instance->setUpdateAt(new \DateTime());
       
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
			->add('created_at')
			->add('update_at')
			->add('status')
			;
    }
    
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
			->add('id')
			->add('name')
                        ->add('alias')
			->add('class')
                        ->add('id_attribute')
			->add('position')
                        ->add('status')
			->add('update_at')
                        ->add('created_at')
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
            ->add('position')
            ->add('alias')
            ->add('status', null, array('label' => 'active'))
            ->add('class')
            ->add('id_attribute')
            ->add('items', \Sonata\CoreBundle\Form\Type\CollectionType::class, array(
                'label' => 'Menu items',
                'by_reference' => false,
                'type_options' => array('delete' => true)
            ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'position',
                )
            );
            //->add('createdAt',DateTimePickerType::class, array(
            //  'format' => 'dd/MM/yyyy HH:mm',
            //  'widget' => 'single_text',
            //  'label' => 'Created date',
            //    ));
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
			->add('id')
			->add('name')
                        ->add('alias')
			->add('class')
                        ->add('id_attribute')
			->add('position')
			->add('created_at')
			->add('update_at')
			->add('status')
			;
    }
}
