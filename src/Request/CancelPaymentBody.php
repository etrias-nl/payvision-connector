<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Request;

use Etrias\PayvisionConnector\Type\CancelTransaction;

class CancelPaymentBody
{
    /** @var null|CancelTransaction */
    protected $transaction;

    public function getTransaction(): ?CancelTransaction
    {
        return $this->transaction;
    }

    public function setTransaction(?CancelTransaction $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }
}
