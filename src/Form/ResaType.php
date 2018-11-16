<?php

namespace App\Form;

use App\Entity\Utilisation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
                    'Niort' => '',
                    'Autre' => '',
                ]
            ])
            ->add('email', EmailType::class)
            ->add('personne')
        ;
        if ($options['validation_groups'] == ['extern']){
            $builder
                ->add('nomPersonne',TextType::class, array(
                    'label' => 'Votre Nom : ',
                    'required' => true,
                ))->add('prenomPersonne',TextType::class, array(
                    'label' => 'Votre Prénom : ',
                    'required' => true,
                ));
        }
        $builder
            ->add('Envoyer', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisation::class,
            'validation_groups' => function(FormInterface $form){
                if ($form->getData()->getEmail() === 'extern@gmail.com'){
                    return ['extern'];
                }else{
                    return ['intern'];
                }
            },
        ]);
    }
}
