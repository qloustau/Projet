<?php

namespace App\Form;

use App\Entity\Utilisation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nature', ChoiceType::class)
            ->add('dateDebutUtilisation', DateType::class, array(
                'format' => 'dd-MM-yyyy'
            ))
            ->add('dateFinUtilisation',DateType::class, array(
        'format' => 'dd-MM-yyyy'
        ))
            ->add('lieuReception', ChoiceType::class, array(
                'Villes' => array(
                    'Paris',
                    'Lyon',
                    'Nantes',
                    'Autres',
            )))
            ->add('destination')
            ->add('email')
            ->add('personne')
            ->add('voiture')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisation::class,
        ]);
    }
}
