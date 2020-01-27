<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Request;

use Etrias\PayvisionConnector\Type\BillingAddress;
use Etrias\PayvisionConnector\Type\Customer;
use Etrias\PayvisionConnector\Type\Order;
use Etrias\PayvisionConnector\Type\ShippingAddress;

trait PaymentBodyTrait
{
    /** @var null|Customer */
    protected $customer;

    /** @var null|BillingAddress */
    protected $billingAddress;

    /** @var null|ShippingAddress */
    protected $shippingAddress;

    /** @var null|Order */
    protected $order;

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getBillingAddress(): ?BillingAddress
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(?BillingAddress $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    public function getShippingAddress(): ?ShippingAddress
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress(?ShippingAddress $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    public function getOrder(): ?Order
    {
        return $this->order;
    }

    public function setOrder(?Order $order): self
    {
        $this->order = $order;

        return $this;
    }
}
