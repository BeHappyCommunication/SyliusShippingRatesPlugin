<?php

declare(strict_types = 1);

namespace BeHappy\SyliusShippingRatesPlugin\Form\Type\Shipping\Calculator;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

final class PricePercentConfigurationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $form = $event->getForm();
            $data = $event->getData();
            if (isset($data['amount'])) {
                $data['amount'] /= 100;
            }
            $form->add('amount', PercentType::class, [
                'label' => 'behappy_shipping_rates.form.shipping_calculator.price_percent_configuration.percent',
                'data' => $data['amount'],
                'scale' => 2,
                'constraints' => [
                    new NotBlank(['groups' => ['sylius']]),
                    new Type(['type' => 'float', 'groups' => ['sylius']]),
                ],
            ]);
        });
    
        $builder->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) use ($options): void {
            $eventData = $event->getData();
            $eventData['amount'] *= 100;
            $event->setData($eventData);
        });
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'behappy_shipping_rates_calculator_price_percent';
    }
}