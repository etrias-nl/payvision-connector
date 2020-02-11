<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class Bank
{
    use BankTrait;

    /** @var null|int */
    protected $issuerId;

    /** @var null|string */
    protected $bankCode;

    /** @var null|string */
    protected $mandateId;

    /** @var null|\DateTime */
    protected $dateCollection;

    /** @var null|\DateTime */
    protected $dateMandateSigned;

    public function getIssuerId(): ?int
    {
        return $this->issuerId;
    }

    public function setIssuerId(?int $issuerId): self
    {
        $this->issuerId = $issuerId;

        return $this;
    }

    public function getBankCode(): ?string
    {
        return $this->bankCode;
    }

    public function setBankCode(?string $bankCode): self
    {
        $this->bankCode = $bankCode;

        return $this;
    }

    public function getMandateId(): ?string
    {
        return $this->mandateId;
    }

    public function setMandateId(?string $mandateId): self
    {
        $this->mandateId = $mandateId;

        return $this;
    }

    public function getDateCollection(): ?\DateTime
    {
        return $this->dateCollection;
    }

    public function setDateCollection(?\DateTime $dateCollection): self
    {
        $this->dateCollection = $dateCollection;

        return $this;
    }

    public function getDateMandateSigned(): ?\DateTime
    {
        return $this->dateMandateSigned;
    }

    public function setDateMandateSigned(?\DateTime $dateMandateSigned): self
    {
        $this->dateMandateSigned = $dateMandateSigned;

        return $this;
    }
}
