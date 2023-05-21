<?php

namespace App\Form;

use App\Entity\Demandes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Entity\Service;
use App\Entity\Disponibilite;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class DemandesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('planedDate', DateType::class, [
                'data' => new \DateTime('+1 day'),
                'widget' => 'single_text',
                'label' => 'Ajouter une date',
                'label_attr' => ['class' => 'planed-date'],
                'attr' => ['class' => 'planed-date'],
            ])
            ->add('debut_time')
            ->add('end_time')
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Demandes::class,
        ]);
    }
}
