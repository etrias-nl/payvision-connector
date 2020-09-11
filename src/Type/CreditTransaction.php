<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class CreditTransaction
{
    use TransactionReferenceTrait;

    /** @var null|int */
    protected $storeId;

    /** @var null|string */
    protected $countryCode;

    /** @var null|int */
    protected $brandId;

    /** @var null|string */
    protected $source;

    /** @var null|string */
    protected $type;

    /** @var null|string */
    protected $descriptor;

    /** @var null|string */
    protected $token;

    /** @var null|bool */
    protected $tokenize;

    public function getStoreId(): ?int
    {
        return $this->storeId;
    }

    public function setStoreId(?int $storeId): self
    {
        $this->storeId = $storeId;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getBrandId(): ?int
    {
        return $this->brandId;
    }

    public function setBrandId(?int $brandId): self
    {
        $this->brandId = $brandId;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescriptor(): ?string
    {
        return $this->descriptor;
    }

    public function setDescriptor(?string $descriptor): self
    {
        $this->descriptor = $descriptor;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getTokenize(): ?bool
    {
        return $this->tokenize;
    }

    public function setTokenize(?bool $tokenize): self
    {
        $this->tokenize = $tokenize;

        return $this;
    }
}
