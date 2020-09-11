<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

trait CardTrait
{
    /** @var null|string */
    protected $holderName;

    /** @var null|string */
    protected $expiryMonth;

    /** @var null|string */
    protected $expiryYear;

    public function getHolderName(): ?string
    {
        return $this->holderName;
    }

    public function setHolderName(?string $holderName): self
    {
        $this->holderName = $holderName;

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
            $expiryYear = sprintf('%04d', $expiryYear);
        }

        $this->expiryYear = $expiryYear;

        return $this;
    }
}
