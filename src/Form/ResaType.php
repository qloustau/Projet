<?php

namespace App\Form;

use App\Entity\Utilisation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;

class ResaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nature', ChoiceType::class, array(
                'choices' => [
                    'Temporaire' => '',
                    'Long terme' => '',
                    'Formation' => '',
                    'Autre...' => '',
                ]
            ))
            ->add('dateDebutUtilisation', DateType::class, array(
                'widget' => 'single_text',
            ))
            ->add('dateFinUtilisation',DateType::class, array(
                'widget' => 'single_text',
        ))
            ->add('destination' , ChoiceType::class, [
                'choices' => [
                    'Nantes (Saint Herblain)' => '',
                    'Nantes (Hub Creatic)' => '',
                    'Rennes (Chartres de Bretagne)' => '',
                ]
            ])
            ->add('email', EmailType::class)
            ->add('personne')
            ->add('Envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisation::class,
        ]);
    }
}
