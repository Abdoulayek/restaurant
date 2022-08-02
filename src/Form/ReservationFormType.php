<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class ReservationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Nom'
            ])

            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Email'
            ])

            ->add('Personnes', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Nombre de Personnes'
            ])

            ->add('Heure', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Heure de la réservation'
            ])

            ->add('Telephone', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Téléphone'
            ])

            ->add('Envoyer', SubmitType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Envoyer'
            ])
            
            

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
