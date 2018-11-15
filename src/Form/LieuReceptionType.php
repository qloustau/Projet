<?php

namespace App\Form;

use App\Entity\Voiture;
use App\Repository\VoitureRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LieuReceptionType extends AbstractType
{
    private $lieux;

    public function __construct(VoitureRepository $voitureRepository) {

        $this->lieux = $voitureRepository->recupererParLieuxDeReception();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->lieux['Tous'] = 'Tous';
        $builder
            ->add('lieuReception',ChoiceType::class, array(
                'choices'  =>$this->lieux ,
                'label' => 'Lieux :',
                'preferred_choices' => function($lieux) {
                    return ($lieux === 'Tous');},
            ))
        ;
    }
}
