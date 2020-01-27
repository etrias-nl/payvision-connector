<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class Card
{
    /** @var null|string */
    protected $holderName;

    /** @var null|string */
    protected $number;

    /** @var null|string */
    protected $expiryMonth;

    /** @var null|string */
    protected $expiryYear;

    /** @var null|string */
    protected $cvv;

    public function getHolderName(): ?string
    {
        return $this->holderName;
    }

    public function setHolderName(?string $holderName): self
    {
        $this->holderName = $holderName;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getExpiryMonth(): ?string
    {
        return $this->expiryMonth;
    }

    /**
     * @param null|int|string $expiryMonth
     */
    public function setExpiryMonth($expiryMonth): self
    {
        if (\is_int($expiryMonth)) {
            $expiryMonth = sprintf('%02d', $expiryMonth);
        }

        $this->expiryMonth = $expiryMonth;

        return $this;
    }

    public function getExpiryYear(): ?string
    {
        return $this->expiryYear;
    }

    /**
     * @param null|int|string $expiryYear
     */
    public function setExpiryYear($expiryYear): self
    {
        if (\is_int($expiryYear)) {
            $expiryMonth = sprintf('%04d', $expiryYear);
        }

        $this->expiryYear = $expiryYear;

        return $this;
    }

    public function getCvv(): ?string
    {
        return $this->cvv;
    }

    public function setCvv(?string $cvv): self
    {
        $this->cvv = $cvv;

        return $this;
    }
}
