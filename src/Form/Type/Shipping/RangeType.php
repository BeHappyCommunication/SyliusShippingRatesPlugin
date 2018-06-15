<?php

declare(strict_types = 1);

namespace BeHappy\SyliusShippingRangeRatePlugin\Form\Type\Shipping;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class RangeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('fromValue', null, [
            'label' => 'behappy_shipping_range_rate.form.from_value.label',
        ]);
        $builder->add('toValue', null, [
            'label' => 'behappy_shipping_range_rate.form.to_value.label',
        ]);
        $builder->add('amount', null, [
            'label' => 'behappy_shipping_range_rate.form.amount.label',
        ]);
    }
    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefaults([
                'data_class' => null,
            ])
        ;
    }
    
    public function getBlockPrefix(): string
    {
        return 'behappy_shipping_range_rate_calculator_weight_range';
    }
}