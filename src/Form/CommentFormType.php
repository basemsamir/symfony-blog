<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('article_id', HiddenType::class)
            ->add('content', TextareaType::class,
            [
                'attr'  => [
                    'class'         => 'form-control',
                    'placeholder'   => 'Messege',
                    'rows'          =>  5,
                    'onfocus'       => "this.placeholder = ''",
                    'onblur'        => "this.placeholder = 'Enter Message'"
                ]
            ])
            ->add('name', TextType::class,
            [
                'attr'  => [
                    'class'         => 'form-control',
                    'placeholder'   => 'Enter Name',
                    'onfocus'       => "this.placeholder = ''",
                    'onblur'        => "this.placeholder = 'Enter Name'"
                ]
            ])
            ->add('email', EmailType::class,
            [
                'attr'  => [
                    'class'         => 'form-control',
                    'placeholder'   => 'Enter Email',
                    'onfocus'       => "this.placeholder = ''",
                    'onblur'        => "this.placeholder = 'Enter Email'"
                ]
            ])
            ->add('submit', SubmitType::class,[
                'attr' => [
                    'class' => 'button submit_btn'
                ],
                'label' => 'Post Comment'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
        ]);

    }
}
