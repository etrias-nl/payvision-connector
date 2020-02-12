<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

trait LinkTrait
{
    /** @var string[] */
    protected $brandIds = [];

    /** @var null|\DateTime */
    protected $expirationTime;

    /** @var null|bool */
    protected $threeDSecure;

    /**
     * @return string[]
     */
    public function getBrandIds(): array
    {
        return $this->brandIds;
    }

    public function setBrandIds(array $brandIds): self
    {
        $this->brandIds = $brandIds;

        return $this;
    }

    public function addBrandId(string $brandId): self
    {
        $this->brandIds[] = $brandId;

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

    public function isThreeDSecure(): ?bool
    {
        return $this->threeDSecure;
    }

    public function setThreeDSecure(?bool $threeDSecure): self
    {
        $this->threeDSecure = $threeDSecure;

        return $this;
    }
}
