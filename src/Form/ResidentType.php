<?php

namespace App\Form;

use App\Entity\Resident;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ResidentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, ['attr' => ['placeholder' => 'Prénom']])
            ->add('lastname', TextType::class, ['attr' => ['placeholder' => 'Nom']])
            ->add('dailyComsumption', IntegerType::class, ['attr' => ['placeholder' => 'Consommation journalière']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Resident::class,
        ]);
    }
}
