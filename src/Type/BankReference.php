<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class BankReference
{
    use BankTrait;

    /** @var null|string */
    protected $name;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
