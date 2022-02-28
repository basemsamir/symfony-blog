<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewletterSubscribtionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'attr' => [
                    'class'         => 'form-control',
                    'placeholder'   => "Enter email",
                    'onfocus'       => "this.placeholder = ''",
                    'onblur'        => "this.placeholder = 'Enter email'"
                ]
            ])
            ->add('submit', SubmitType::class,[
                'attr'  => [
                    'class' => 'bbtns d-block mt-20 w-100'
                ],
                'label' => 'Subscribe'
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
