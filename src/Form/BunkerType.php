<?php

namespace App\Form;

use App\Entity\Bunker;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BunkerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['attr' => ['placeholder' => 'Nom du bunker']])
            ->add('stockCapacity', IntegerType::class, ['attr' => ['placeholder' => 'Capacité du stock']])
            ->add('residentCapacity', IntegerType::class, ['attr' => ['placeholder' => 'Capacité humaine']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bunker::class,
        ]);
    }
}
