<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

trait TrackingCodeTrait
{
    /** @var null|string */
    protected $trackingCode;

    public function getTrackingCode(): ?string
    {
        return $this->trackingCode;
    }

    public function setTrackingCode(?string $trackingCode): self
    {
        $this->trackingCode = $trackingCode;

        return $this;
    }
}
