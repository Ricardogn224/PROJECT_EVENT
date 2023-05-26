<?php

namespace App\Form;

use App\Entity\Service;
use App\Entity\Evenement;
use App\Entity\OptionService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('prix')
            ->add('localisation')
            ->add('imageFile', VichImageType::class, [
                'label' => 'Une image représentant votre service',
            ])
            ->add('evenements', EntityType::class, [
                // looks for choices from this entity
                'class' => Evenement::class,
                'by_reference' => false,
                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
        ]);
    }
}
