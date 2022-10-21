<?php

namespace App\Form;

use App\Entity\Clients;
use App\Enum\VatRates;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ClientsType extends AbstractType
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
        $builder
            ->add('colours', ChoiceType::class, [
                'choices' => [
                    'zielony' => 'green',
                    'niebieski' => 'blue',
                    'szary' => 'grey',
                    'turkusowy' => 'turquoise',
                    'granatowy' => 'navy',
                    'czerwony' => 'red',
                    'biały' => 'white'
                ]])
            ->add('vat_rates', ChoiceType::class, [
                'choices' => VatRates::VAT_RATES])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Clients::class,
        ]);
    }
}
