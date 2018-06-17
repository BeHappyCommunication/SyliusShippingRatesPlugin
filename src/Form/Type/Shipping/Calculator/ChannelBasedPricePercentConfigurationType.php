<?php

declare(strict_types = 1);

namespace BeHappy\SyliusShippingRatesPlugin\Form\Type\Shipping\Calculator;

use Sylius\Bundle\CoreBundle\Form\Type\ChannelCollectionType;
use Sylius\Component\Core\Model\ChannelInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ChannelBasedPricePercentConfigurationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'entry_type' => PricePercentConfigurationType::class,
            'entry_options' => function (ChannelInterface $channel): array {
                return [
                    'label' => $channel->getName(),
                ];
            },
        ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getParent(): string
    {
        return ChannelCollectionType::class;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'behappy_shipping_rates_channel_based_shipping_calculator_price_percent';
    }
}