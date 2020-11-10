<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class ThreeDSecure
{
    public const VERSION_2 = '2';

    /** @var null|string */
    protected $version;

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }
}
