<?php

namespace App\Form;

use App\Entity\enseignant;
use App\Entity\etudiant;
use App\Entity\Soutenance;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SoutenanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numjury')
            ->add('date_soutenance', null, [
                'widget' => 'single_text',
            ])
            ->add('note')
            ->add('enseignant', EntityType::class, [
                'class' => enseignant::class,
                'choice_label' => 'id',
            ])
            ->add('etudiant', EntityType::class, [
                'class' => etudiant::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Soutenance::class,
        ]);
    }
}
