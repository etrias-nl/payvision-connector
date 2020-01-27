<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class Link
{
    use BrandIdsTrait;

    /** @var null|string */
    protected $duration;

    /** @var null|\DateTime */
    protected $expirationTime;

    /** @var null|string */
    protected $returnUrl;

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(?string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getExpirationTime(): ?\DateTime
    {
        return $this->expirationTime;
    }

    public function setExpirationTime(?\DateTime $expirationTime): self
    {
        $this->expirationTime = $expirationTime;

        return $this;
    }

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
