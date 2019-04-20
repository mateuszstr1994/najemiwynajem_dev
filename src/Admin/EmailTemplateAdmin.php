<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class EmailTemplateAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
			->add('name')
			->add('subject')
			->add('body_plain_text')
			->add('body_html')
			->add('id')
			->add('created_at')
			->add('update_at')
			;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
			->add('name')
			->add('subject')
			->add('body_plain_text')
			->add('body_html')
			->add('id')
			->add('created_at')
			->add('update_at')
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
			->add('subject')
			->add('body_plain_text')
			->add('body_html')
			;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
			->add('name')
			->add('subject')
			->add('body_plain_text')
			->add('body_html')
			->add('id')
			->add('created_at')
			->add('update_at')
			;
    }
}
