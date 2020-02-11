<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Response;

use Etrias\PayvisionConnector\Type\BankReference;
use Etrias\PayvisionConnector\Type\Redirect;
use Etrias\PayvisionConnector\Type\TransactionReference;

class PaymentBody
{
    /** @var null|TransactionReference */
    protected $transaction;

    /** @var null|Redirect */
    protected $redirect;

    /** @var null|BankReference */
    protected $bank;

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

    public function getBank(): ?BankReference
    {
        return $this->bank;
    }

    public function setBank(?BankReference $bank): self
    {
        $this->bank = $bank;

        return $this;
    }
}
