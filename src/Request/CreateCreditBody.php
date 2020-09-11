<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Request;

use Etrias\PayvisionConnector\Type\BankReference;
use Etrias\PayvisionConnector\Type\CardWithoutCvv;
use Etrias\PayvisionConnector\Type\CreditTransaction;
use Etrias\PayvisionConnector\Type\Customer;

class CreateCreditBody
{
    /** @var null|CreditTransaction */
    protected $transaction;

    /** @var null|CardWithoutCvv */
    protected $card;

    /** @var null|BankReference */
    protected $bank;

    /** @var null|Customer */
    protected $customer;

    public function getTransaction(): ?CreditTransaction
    {
        return $this->transaction;
    }

    public function setTransaction(?CreditTransaction $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }

    public function getCard(): ?CardWithoutCvv
    {
        return $this->card;
    }

    public function setCard(?CardWithoutCvv $card): self
    {
        $this->card = $card;

        return $this;
    }

    public function getBank(): ?BankReference
    {
        return $this->bank;
    }

    public function setBank(?BankReference $bank): self
    {
        $this->bank = $bank;

        return $this;
    }

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
