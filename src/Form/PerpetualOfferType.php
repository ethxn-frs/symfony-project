<?php

namespace App\Form;

use App\Entity\Offer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTime;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PerpetualOfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['min' => 3, 'max' =>30]),
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
            ->add('text', TextareaType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['min' => 10, 'max' => 400]),
                ],
            ])
            ->add('dateStart', DateTimeType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\DateTime(['format' => 'd/m/Y H:m:s']),
                ],
            ])
            ->add('dateEnd', DateTimeType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\DateTime(['format' => 'd/m/Y H:m:s']),
                ],
            ])
            ->add('creationDate', DateTimeType::class, [
                'widget' => 'single_text',
                'data' => new \DateTime(),
                'html5' => false,
                'format' => 'd/m/y H:m:s',
                'disabled' => true, // Désactive le champ pour modification
                'attr' => [
                    'style' => 'display:none;', // Masque l'affichage du champ
                ],
                'label_attr' => [
                    'style' => 'display:none;', // Masque l'affichage du libellé
                ],
            ])
            ->add('minPlace', IntegerType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Type(['type' => 'integer']),
                ],
            ])
            ->add('keyword')  // ?
            ->add('status', IntegerType::class, [
                'data' => 1, // Définit la valeur par défaut à 1
                'disabled' => true, // Désactive le champ pour modification
                'attr' => [
                    'style' => 'display:none;', // Masque l'affichage du champ
                ],
                'label_attr' => [
                    'style' => 'display:none;', // Masque l'affichage du libellé
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offer::class,
        ]);
    }
}
