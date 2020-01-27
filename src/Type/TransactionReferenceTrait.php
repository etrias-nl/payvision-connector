<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

trait TransactionReferenceTrait
{
    use TrackingCodeTrait;

    /** @var null|float|int|string */
    protected $amount;

    /** @var null|string */
    protected $currencyCode;

    /**
     * @return null|float|int|string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param null|float|int|string $amount
     */
    public function setAmount($amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    public function setCurrencyCode(?string $currencyCode): self
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }
}
