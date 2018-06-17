<?php

declare(strict_types = 1);

namespace BeHappy\SyliusShippingRatesPlugin;

use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class BeHappySyliusShippingRatesPlugin
 *
 * @package BeHappy\SyliusShippingRatesPlugin
 */
class BeHappySyliusShippingRatesPlugin extends Bundle
{
    use SyliusPluginTrait;
}