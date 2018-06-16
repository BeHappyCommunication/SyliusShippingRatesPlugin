#Sylius Shipping Range Rate Plugin
A Sylius plugin to manage shipping according to ranges of custom values.

# Installation-procedure
```bash
$ composer require behappy/shipping-range-rate-plugin
```

## Enable the plugin

```php
// in app/AppKernel.php
public function registerBundles() {
	$bundles = array(
		// ...
        new \BeHappy\SyliusShippingRangeRatePlugin\BeHappySyliusShippingRangeRatePlugin(),
    );
    // ...
}
```

```yaml
#in app/config/config.yml
imports:
    ...
    - { resource: "@BeHappySyliusShippingRangeRatePlugin/Resources/config/config.yml" }
    ...
```

# That's it !
You now have access to 2 new shipping calculator 'Shipping rate by weight ranges' and 'Shipping rate by price ranges'.

At this moment, only weight and prices ranges are supported since other ranges would be very specific to each use case.
But this plugin gives you a good start point to implement other shipping methods according to ranges.

## Warning
/!\ In order to add ranges definition, you first have to save your shipping method with the calculator, then add ranges. This is due to Sylius and Javascript event management than won't properly trigger events on dynamically added elements

# Feel free to contribute
You can also ask your questions at the mail address in the composer.json mentioning this package.

# Other
You can also check our other packages (including Sylius plugins) at https://github.com/BeHappyCommunication
