<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class Transaction
{
    use TransactionTrait;

    /** @var null|string */
    protected $returnUrl;

    public function getReturnUrl(): ?string
    {
        return $this->returnUrl;
    }

    public function setReturnUrl(?string $returnUrl): self
    {
        $this->returnUrl = $returnUrl;

        return $this;
    }
}
