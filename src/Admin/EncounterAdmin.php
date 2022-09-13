<?php

declare(strict_types=1);

namespace App\Admin;

use App\Form\InjuryType As InjuryFormType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Sonata\AdminBundle\Show\ShowMapper;

final class EncounterAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('id')
            ->add('chance_t1')
            ->add('chance_t2')
            ->add('injuries_t1')
            ->add('injuries_t2')
            ->add('summery')
            ->add('report')
            ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->add('id')
            ->add('chance_t1')
            ->add('chance_t2')
            ->add('injuries_t1')
            ->add('injuries_t2')
            ->add('summery')
            ->add('report')
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->with('Team 1', ['class' => 'col-md-6'])
            ->add('chance_t1')
            ->add('injuries_t1', CollectionType::class, [
                'entry_type' => InjuryFormType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,

            ],array('edit' => 'inline',
                'inline' => 'table'
            ))
            ->add('points_t1')
            ->end()
            ->with('Team 2', ['class' => 'col-md-6'])
            ->add('chance_t2')
            ->add('injuries_t2', CollectionType::class, [
                'entry_type' => InjuryFormType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,

            ],array('edit' => 'inline',
                'inline' => 'table'
            ))
            ->add('points_t2')
            ->end()
            ->with("", ['class' => 'col-md-12'])
            ->add('report',CKEditorType::class, [
                'config' => array()
            ])
            ->end()

            ;
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('id')
            ->add('chance_t1')
            ->add('chance_t2')
            ->add('injuries_t1')
            ->add('injuries_t2')
            ->add('summery')
            ->add('report')
            ;
    }
}
