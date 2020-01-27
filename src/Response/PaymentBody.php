<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Response;

use Etrias\PayvisionConnector\Type\Redirect;
use Etrias\PayvisionConnector\Type\TransactionReference;

class PaymentBody
{
    /** @var null|TransactionReference */
    protected $transaction;

    /** @var null|Redirect */
    protected $redirect;

    public function getTransaction(): ?TransactionReference
    {
        return $this->transaction;
    }

    public function setTransaction(?TransactionReference $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }

    public function getRedirect(): ?Redirect
    {
        return $this->redirect;
    }

    public function setRedirect(?Redirect $redirect): self
    {
        $this->redirect = $redirect;

        return $this;
    }
}
