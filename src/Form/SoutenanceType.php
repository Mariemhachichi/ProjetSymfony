<?php

namespace App\Form;

use App\Entity\enseignant;
use App\Entity\etudiant;
use App\Entity\Soutenance;
use Doctrine\DBAL\Types\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SoutenanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('numjury', IntegerType::class, [
            'label' => 'Numéro du Jury',
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Entrez le numéro du jury',
            ],
        ])
        ->add('date_soutenance', DateType::class, [
            'widget' => 'single_text', // Affiche un champ date sous forme de texte unique
            'label' => 'Date de la soutenance',
            'attr' => [
                'class' => 'form-control',
            ],
        ])
        ->add('note', IntegerType::class, [
            'label' => 'Note',
            'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Entrez la note',
            ],
        ])
        ->add('enseignant', EntityType::class, [
            'class' => Enseignant::class, 
            'choice_label' => 'id', 
            'label' => 'Enseignant',
            'attr' => [
                'class' => 'form-control',
            ],
        ])
        ->add('etudiant', EntityType::class, [
            'class' => Etudiant::class,
            'choice_label' => 'id', 
            'label' => 'Étudiant',
            'attr' => [
                'class' => 'form-control',
            ],
        ]);
    
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Soutenance::class,
        ]);
    }
}
