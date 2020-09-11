<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class Card
{
    use CardNumberTrait;

    /** @var null|string */
    protected $cvv;

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
