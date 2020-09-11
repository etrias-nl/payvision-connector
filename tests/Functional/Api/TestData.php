<?php

declare(strict_types=1);

namespace Tests\Etrias\PayvisionConnector\Functional\Api;

use Etrias\PayvisionConnector\Type\Bank;
use Etrias\PayvisionConnector\Type\BankReference;
use Etrias\PayvisionConnector\Type\BillingAddress;
use Etrias\PayvisionConnector\Type\Card;
use Etrias\PayvisionConnector\Type\Customer;
use Etrias\PayvisionConnector\Type\Order;
use Etrias\PayvisionConnector\Type\OrderLine;
use Etrias\PayvisionConnector\Type\ShippingAddress;

abstract class TestData
{
    public const BRAND_IDEAL = 'iDeal';
    public const BRAND_VISA = 'VISA';
    public const BRAND_ID_SEPA = 6010;

    public static function visaCard(): Card
    {
        $card = new Card();
        $card
            ->setHolderName('John Doe')
            ->setNumber('4444333322221111')
            ->setExpiryMonth(3)
            ->setExpiryYear(2025)
            ->setCvv('123')
        ;

        return $card;
    }

    public static function bank(): Bank
    {
        $bank = new Bank();
        $bank
            ->setAccountHolderName('John Doe')
            ->setIban('NL91ABNA0417164300')
            ->setBic('ABNANL2A')
            ->setCountryCode('NL')
        ;

        return $bank;
    }

    public static function bankReference(): BankReference
    {
        $bank = new BankReference();
        $bank
            ->setAccountHolderName('John Doe')
            ->setAccountNumber('1234567890')
            ->setIban('NL91ABNA0417164300')
            ->setBic('ABNANL2A')
            ->setCountryCode('NL')
        ;

        return $bank;
    }

    public static function customer(): Customer
    {
        $customer = new Customer();
        $customer
            ->setCustomerId('123456789')
            ->setGivenName('John')
            ->setFamilyName('Doe 😁')
            ->setSex(Customer::SEX_MALE)
            ->setBirthDate((new \DateTime())->setTimestamp(mktime(0, 0, 0, 7, 28, 1987)))
            ->setPhoneNumber('+0123456789')
            ->setMobileNumber('+0123456789')
            ->setEmail('john.doe@domain.test')
            ->setCompanyName('Company Inc.')
            ->setIdentificationTypeId(Customer::ID_PASSPORT)
            ->setIdentificationNumber('123456')
            ->setIpAddress('127.0.0.1')
            ->setType(Customer::TYPE_PERSONAL)
            ->setTaxNumber('654321')
            ->setHttpUserAgent('Some/UserAgent')
            ->setDeviceType(Customer::DEVICE_DESKTOP_APP)
        ;

        return $customer;
    }

    public static function order(): Order
    {
        $line1 = new OrderLine();
        $line1
            ->setProductCode('A')
            ->setProductName('Product A')
            ->setDescription('About Product A')
            ->setItemAmount(1.5)
            ->setQuantity(1)
            ->setTotalAmount(1.5)
            ->setTaxPercentage(21)
        ;

        $line2 = new OrderLine();
        $line2
            ->setProductCode('B')
            ->setProductName('Product B')
            ->setDescription('About Product B')
            ->setItemAmount(2)
            ->setQuantity(2)
            ->setTotalAmount(4)
            ->setTaxPercentage(0.5)
        ;

        $order = new Order();
        $order->setOrderLines([$line1, $line2]);

        return $order;
    }

    public static function billingAddress(): BillingAddress
    {
        $address = new BillingAddress();
        $address
            ->setStreet('Straatnaam 😁')
            ->setHouseNumber('1')
            ->setHouseNumberSuffix('A')
            ->setCity('Test stad')
            ->setZip('1111AA')
            ->setCountryCode('NL')
        ;

        return $address;
    }

    public static function shippingAddress(?Customer $customer = null): ShippingAddress
    {
        $address = new ShippingAddress();
        $address
            ->setStreet('Straatnaam 😁')
            ->setHouseNumber('1')
            ->setHouseNumberSuffix('A')
            ->setCity('Test stad')
            ->setZip('1111AA')
            ->setCountryCode('NL')
            ->setCustomer($customer ?? self::customer())
        ;

        return $address;
    }

    public static function trackingCode(): string
    {
        return 'TEST-'.bin2hex(random_bytes(10));
    }
}
