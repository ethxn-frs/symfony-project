<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use PixelOpen\CloudflareTurnstileBundle\Type\TurnstileType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('firstname', TextType::class)
            ->add('email', EmailType::class)
            ->add('message', TextareaType::class)
            ->add('submit', SubmitType::class)
            ->add('security', TurnstileType::class, ['attr' => ['data-action' => 'contact', 'data-theme' => 'white'], 'label' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
