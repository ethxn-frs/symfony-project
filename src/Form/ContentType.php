<?php

namespace App\Form;

use App\Entity\Content;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('page', ChoiceType::class, [
                'choices' => [
                    'HomePage' => 'HomePage',
                    'AboutPage' => 'AboutPage',
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Choice(['choices' => ['HomePage', 'AboutPage']]),
                ],
            ])
            ->add('section', ChoiceType::class, [
                'choices' => [
                    'Presentation' => 'Presentation',
                    'Reglement' => 'Reglement',
                ],
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Choice(['choices' => ['Presentation', 'Reglement']]),
                ],
            ])
            ->add('title', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['min' => 10, 'max' => 50]),
                ],
            ])
            ->add('content', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['min' => 10, 'max' => 500]),
                ],
            ])
            ->add('image', null, [
                'constraints' => [
                    new Assert\File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Content::class,
        ]);
    }
}
