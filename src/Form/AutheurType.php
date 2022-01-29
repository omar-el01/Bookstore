<?php

namespace App\Form;

use App\Entity\Autheur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class AutheurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_prenom',TextType::class,[
                'label' => 'Nom et Prenom',
                'attr'  => ['class' => 'form-control my-3']
            ])
            ->add('sexe',ChoiceType::class,[
                'choices' => [
                    'Feminin' => 'F',
                    'Masculin' => 'M'
                ],
                'attr' => ['class' => 'form-control my-3']
            ])
            ->add('date_naissance',DateType::class,[
             'label' => 'Date de naissance',
             'widget' => 'single_text',
            'attr' => ['class' => 'form-control my-3']
            ])
            ->add('nationalite',TextType::class,['attr' => ['class' => 'form-control my-3']])
            ->add('livres',null,[
                'label' => 'Livres',
                'attr'  => ['class' => 'form-control my-3']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Autheur::class,
        ]);
    }
}
