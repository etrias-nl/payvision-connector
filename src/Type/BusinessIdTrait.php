<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

trait BusinessIdTrait
{
    /** @var null|string */
    protected $businessId;

    public function getBusinessId(): ?string
    {
        return $this->businessId;
    }

    public function setBusinessId(?string $businessId): self
    {
        $this->businessId = $businessId;

        return $this;
    }
}
