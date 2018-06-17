#Sylius Shipping Rates Plugin
A Sylius plugin to add more shipping calculators.

# Installation-procedure
```bash
$ composer require behappy/shipping-rates-plugin
```

## Enable the plugin

```php
// in app/AppKernel.php
public function registerBundles() {
	$bundles = array(
		// ...
        new \BeHappy\SyliusShippingRatesPlugin\BeHappySyliusShippingRatesPlugin(),
    );
    // ...
}
```

```yaml
#in app/config/config.yml
imports:
    ...
    - { resource: "@BeHappySyliusShippingRatesPlugin/Resources/config/config.yml" }
    ...
```

# That's it !
You now have access to 3 new shipping calculators :
  * 'Shipping rate by weight ranges' to charge according to the total order weight
  * 'Shipping rate by price ranges' to charge according to the total order price
  * 'Selling price percentage (%)' to charge a % of the order total

## Warning
/!\ In order to add ranges definition, you first have to save your shipping method with the calculator, then add ranges. This is due to Sylius and Javascript event management than won't properly trigger events on dynamically added elements

# Feel free to contribute
You can also ask your questions at the mail address in the composer.json mentioning this package.

# Other
You can also check our other packages (including Sylius plugins) at https://github.com/BeHappyCommunication
