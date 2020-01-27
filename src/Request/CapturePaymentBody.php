<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Request;

use Etrias\PayvisionConnector\Type\CaptureTransaction;

class CapturePaymentBody
{
    /** @var null|CaptureTransaction */
    protected $transaction;

    public function getTransaction(): ?CaptureTransaction
    {
        return $this->transaction;
    }

    public function setTransaction(?CaptureTransaction $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }
}
