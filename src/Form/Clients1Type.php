<?php

namespace App\Form;

use App\Entity\Clients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Clients1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nip')
            ->add('regon')
            ->add('name')
            ->add('vat')
            ->add('street')
            ->add('houseNo')
            ->add('flatNo')
            ->add('firstContactDate')
            ->add('comments')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Clients::class]);
    }
}
