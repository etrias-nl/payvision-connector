<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Request;

use Etrias\PayvisionConnector\Type\RefundTransaction;

class RefundPaymentBody
{
    /** @var null|RefundTransaction */
    protected $transaction;

    public function getTransaction(): ?RefundTransaction
    {
        return $this->transaction;
    }

    public function setTransaction(?RefundTransaction $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }
}
