<?php

declare(strict_types = 1);

namespace BeHappy\SyliusShippingRangeRatePlugin\Form\Type\Shipping\Calculator;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RangeConfigurationType
 *
 * @package BeHappy\SyliusShippingRangeRatePlugin\Form\Type\Shipping\Calculator
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
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('ranges', CollectionType::class, [
            'label' => 'behappy_shipping_range_rate.form.shipping_calculator.ranges.label',
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
     * @param OptionsResolver $resolver
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
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'behappy_shipping_range_rate_calculator_range';
    }
}