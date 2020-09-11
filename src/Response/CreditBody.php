<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Response;

use Etrias\PayvisionConnector\Type\BankReference;
use Etrias\PayvisionConnector\Type\CardReference;
use Etrias\PayvisionConnector\Type\CreditError;
use Etrias\PayvisionConnector\Type\CreditTransactionReference;
use Etrias\PayvisionConnector\Type\TokenReference;

class CreditBody
{
    /** @var null|CreditTransactionReference */
    protected $transaction;

    /** @var null|CardReference */
    protected $card;

    /** @var null|BankReference */
    protected $bank;

    /** @var null|TokenReference */
    protected $token;

    /** @var null|CreditError */
    protected $error;

    public function getTransaction(): ?CreditTransactionReference
    {
        return $this->transaction;
    }

    public function setTransaction(?CreditTransactionReference $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }

    public function getCard(): ?CardReference
    {
        return $this->card;
    }

    public function setCard(?CardReference $card): self
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

    public function getToken(): ?TokenReference
    {
        return $this->token;
    }

    public function setToken(?TokenReference $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getError(): ?CreditError
    {
        return $this->error;
    }

    public function setError(?CreditError $error): self
    {
        $this->error = $error;

        return $this;
    }
}
