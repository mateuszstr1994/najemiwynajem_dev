<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;


final class CountryAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
			->add('id')
			->add('name')
			->add('iso2')
			->add('iso3')
			->add('code')
			->add('name_pl')
			->add('name_en')
			->add('continent')
			->add('region')
			;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
			->add('id')
			->add('name')
			->add('iso2')
			->add('iso3')
			->add('code')
			->add('name_pl')
			->add('name_en')
			->add('continent')
			->add('region')
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
			->add('iso2')
			->add('iso3')
			->add('code')
			->add('name_pl')
			->add('name_en')
			->add('continent')
			->add('region')
			;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
			->add('id')
			->add('name')
			->add('iso2')
			->add('iso3')
			->add('code')
			->add('name_pl')
			->add('name_en')
			->add('continent')
			->add('region')
			;
    }
}
