<?php

declare(strict_types = 1);

namespace BeHappy\SyliusShippingRatesPlugin\Form\Type\Shipping\Calculator;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RangeConfigurationType
 *
 * @package BeHappy\SyliusShippingRatesPlugin\Form\Type\Shipping\Calculator
 */
final class RangeConfigurationType extends AbstractType
{
    /** @var AbstractType */
    protected $rangeType;
    
    /**
     * RangeConfigurationType constructor.
     *
     * @param AbstractType $rangeType
     */
    public function __construct(AbstractType $rangeType)
    {
        $this->rangeType = $rangeType;
    }
    
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('ranges', CollectionType::class, [
            'label' => 'behappy_shipping_rates.form.shipping_calculator.ranges.label',
            'entry_type' => get_class($this->rangeType),
            'entry_options' => [
                'attr' => [
                    'class' => 'three fields',
                ],
            ],
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
        ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefaults([
                'data_class' => null,
                'ranges' => [],
            ])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'behappy_shipping_rates_calculator_range';
    }
}