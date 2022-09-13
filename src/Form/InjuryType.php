<?php

namespace App\Form;


use App\Doctrine\Enum\Injury;
use App\Utility\StringUtility;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class InjuryType extends AbstractType
{


    public function buildForm(FormBuilderInterface $formBuilder, array $options): void
    {
        $formBuilder
            ->add("injury" ,EnumType::class,
                [
                    'class' => Injury::class
                ])
            ->add('amount');
    }

    public function configureOptions(OptionsResolver $optionsResolver): void
    {
        $optionsResolver->setDefaults([
            'data_class' => Injury::class,
        ]);
    }

}

