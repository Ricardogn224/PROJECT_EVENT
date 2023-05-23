<?php

namespace App\Form;

use App\Entity\Demandes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class DemandesNewDateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('newPlanedDate', DateType::class, [
                'required' => true,
                'widget' => 'single_text',
                'label' => 'Ajouter une date',
                'label_attr' => ['class' => 'new-planed-date'],
                'attr' => ['class' => 'new-planed-date'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Demandes::class,
        ]);
    }
}
