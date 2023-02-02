<?php

namespace App\Form;

use App\Entity\Can;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class CanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['attr' => ['placeholder' => 'Nom']])
            ->add('capacity', IntegerType::class, ['attr' => ['placeholder' => 'Taille (1 ou 2)']])
            ->add('expirationDate', DateType::class, ['attr' => ['placeholder' => 'date de péremption'], 'widget' => 'single_text'])
            ->add('barCode', IntegerType::class, ['attr' => ['placeholder' => 'Code Barre']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Can::class,
        ]);
    }
}
