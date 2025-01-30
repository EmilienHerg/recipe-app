<?php

namespace App\Form;

use App\Entity\Recette;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints as Assert;
use Webmozart\Assert\Assert as AssertAssert;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => "Nom",
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                // 'help' => 'Ceci est un message d\'aide',
                // 'help_attr' => [
                //     'class' => 'fst-italic ms-4'
                // ],
                'constraints' => [
                    new Assert\Length(['min' => 2, 'max' => '50']),
                    new Assert\NotBlank()
                ]
            ])
            ->add('time', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => "Temps",
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\LessThan(1440),
                    new Assert\Positive()
                ]
            ])
            ->add('PeopleNb', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => "Nombre de personnes",
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\LessThan(50),
                    new Assert\Positive()
                ]
            ])
            ->add('difficulty', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => "Difficulté",
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Range([
                        'min' => '1',
                        'max' => '5'
                    ])
                ]
            ])
            ->add('description', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => "Description",
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\NotBlank() 
                ]
            ])
            ->add('price', MoneyType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => "Prix",
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\LessThan(1000),
                    new Assert\Positive()
                ]
            ])
            ->add('isFavorite', CheckboxType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => "Favori",
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}
