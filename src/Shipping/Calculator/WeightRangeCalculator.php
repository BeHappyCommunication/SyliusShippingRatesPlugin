<?php

declare(strict_types = 1);

namespace BeHappy\SyliusShippingRangeRatePlugin\Shipping\Calculator;

use Sylius\Component\Core\Exception\MissingChannelConfigurationException;
use Sylius\Component\Core\Model\ShipmentInterface;
use Sylius\Component\Shipping\Calculator\CalculatorInterface;
use Sylius\Component\Shipping\Model\ShipmentInterface as BaseShipmentInterface;
use Webmozart\Assert\Assert;

/**
 * Class WeightRangeCalculator
 *
 * @package BeHappy\SyliusRangeShippingRatePlugin\Shipping\Calculator
 */
final class WeightRangeCalculator implements CalculatorInterface
{
    /**
     * @param BaseShipmentInterface $subject
     * @param array                 $configuration
     *
     * @return int
     */
    public function calculate(BaseShipmentInterface $subject, array $configuration): int
    {
        Assert::isInstanceOf($subject, ShipmentInterface::class);
    
        $order = $subject->getOrder();
        $channelCode = $order->getChannel()->getCode();
        
        if (!isset($configuration[$channelCode])) {
            throw new MissingChannelConfigurationException(sprintf(
                'Channel %s has no amount defined for shipping method %s',
                $order->getChannel()->getName(),
                $subject->getMethod()->getName()
            ));
        }
    
        $orderWeight = 0.0;
        foreach ($order->getItems() as $orderItem) {
            $orderWeight += $orderItem->getVariant()->getWeight();
        }
        //Look for the apropriate tax amount
        foreach ($configuration['ranges'] as $range) {
            if ($range['fromValue'] < $orderWeight && $orderWeight <= $range['toValue']) {
                return (int)$range['amount'];
            }
        }
        
        return (int)$configuration[$channelCode]['amount'];
    }
    
    /**
     * @return string
     */
    public function getType(): string
    {
        return 'weight_range';
    }
}