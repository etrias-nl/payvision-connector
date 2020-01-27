<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class Bank
{
    /** @var null|int */
    protected $issuerId;

    /** @var null|string */
    protected $countryCode;

    /** @var null|string */
    protected $accountNumber;

    /** @var null|string */
    protected $accountHolderName;

    /** @var null|string */
    protected $iban;

    /** @var null|string */
    protected $bic;

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

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    public function setAccountNumber(?string $accountNumber): self
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    public function getAccountHolderName(): ?string
    {
        return $this->accountHolderName;
    }

    public function setAccountHolderName(?string $accountHolderName): self
    {
        $this->accountHolderName = $accountHolderName;

        return $this;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(?string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    public function getBic(): ?string
    {
        return $this->bic;
    }

    public function setBic(?string $bic): self
    {
        $this->bic = $bic;

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
