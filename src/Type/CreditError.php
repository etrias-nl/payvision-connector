<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class CreditError
{
    use ErrorTrait;

    /** @var null|string */
    protected $detailedMessage;

    public function getDetailedMessage(): ?string
    {
        return $this->detailedMessage;
    }

    public function setDetailedMessage(?string $detailedMessage): self
    {
        $this->detailedMessage = $detailedMessage;

        return $this;
    }
}
