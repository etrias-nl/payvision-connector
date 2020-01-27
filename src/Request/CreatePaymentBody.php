<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Request;

use Etrias\PayvisionConnector\Type\Bank;
use Etrias\PayvisionConnector\Type\Card;
use Etrias\PayvisionConnector\Type\Transaction;

class CreatePaymentBody
{
    use PaymentBodyTrait;

    /** @var null|Transaction */
    protected $transaction;

    /** @var null|Card */
    protected $card;

    /** @var null|Bank */
    protected $bank;

    public function getTransaction(): ?Transaction
    {
        return $this->transaction;
    }

    public function setTransaction(?Transaction $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }

    public function getCard(): ?Card
    {
        return $this->card;
    }

    public function setCard(?Card $card): self
    {
        $this->card = $card;

        return $this;
    }

    public function getBank(): ?Bank
    {
        return $this->bank;
    }

    public function setBank(?Bank $bank): self
    {
        $this->bank = $bank;

        return $this;
    }
}
