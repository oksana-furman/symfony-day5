<?php

namespace App\Form;

use App\Entity\Todo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TodoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['attr' => ['class' => 'form-control m-2', 'placeholder' => 'Name']])
            ->add('category', TextType::class, ['attr' => ['class' => 'form-control m-2', 'placeholder' => 'Category']])
            ->add('description', TextareaType::class, ['attr' => ['class' => 'form-control m-2', 'placeholder' => 'Description']])
            ->add('priority', ChoiceType::class, ['choices' => ['Low' => 'Low', 'Normal' => 'Normal', 'High' => 'High'],
                'attr' => ['class' => 'form-control m-2']])
            ->add('due_date', DateTimeType::class, ['attr' => ['class' => 'form-control m-2']])
            ->add('create_date', DateTimeType::class, ['attr' => ['class' => 'form-control m-2']])
            ->add('save', SubmitType::class, ['label' => 'Save', 'attr' => ['class' => 'btn btn-success m-2']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Todo::class,
        ]);
    }
}
