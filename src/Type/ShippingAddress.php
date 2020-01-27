<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class ShippingAddress
{
    use AddressTrait;

    /** @var null|Customer */
    protected $customer;

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
