<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

trait CardNumberTrait
{
    use CardTrait;

    /** @var null|string */
    protected $number;

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }
}
