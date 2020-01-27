<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class Customer
{
    public const SEX_MALE = 'M';
    public const SEX_FEMALE = 'F';

    public const ID_PASSPORT = 1;
    public const ID_DRIVER_LICENSE = 2;
    public const ID_CARD = 3;
    public const ID_TAX_STATEMENT = 4;

    public const TYPE_PERSONAL = 1;
    public const TYPE_COMPANY = 2;

    public const DEVICE_DESKTOP_WEB = 1;
    public const DEVICE_DESKTOP_APP = 2;
    public const DEVICE_MOBILE_WEB = 3;
    public const DEVICE_MOBILE_APP = 4;
    public const DEVICE_TABLET_WEB = 5;
    public const DEVICE_TABLET_APP = 6;

    /** @var null|string */
    protected $customerId;

    /** @var null|string */
    protected $givenName;

    /** @var null|string */
    protected $familyName;

    /** @var null|string */
    protected $sex;

    /** @var null|\DateTime */
    protected $birthDate;

    /** @var null|string */
    protected $phoneNumber;

    /** @var null|string */
    protected $mobileNumber;

    /** @var null|string */
    protected $email;

    /** @var null|string */
    protected $companyName;

    /** @var null|int */
    protected $identificationTypeId;

    /** @var null|string */
    protected $identificationNumber;

    /** @var null|string */
    protected $ipAddress;

    /** @var null|int */
    protected $type;

    /** @var null|string */
    protected $taxNumber;

    /** @var null|string */
    protected $httpUserAgent;

    /** @var null|int */
    protected $deviceType;

    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    public function setCustomerId(?string $customerId): self
    {
        $this->customerId = $customerId;

        return $this;
    }

    public function getGivenName(): ?string
    {
        return $this->givenName;
    }

    public function setGivenName(?string $givenName): self
    {
        $this->givenName = $givenName;

        return $this;
    }

    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    public function setFamilyName(?string $familyName): self
    {
        $this->familyName = $familyName;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(?string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getBirthDate(): ?\DateTime
    {
        return $this->birthDate;
    }

    public function setBirthDate(?\DateTime $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getMobileNumber(): ?string
    {
        return $this->mobileNumber;
    }

    public function setMobileNumber(?string $mobileNumber): self
    {
        $this->mobileNumber = $mobileNumber;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getIdentificationTypeId(): ?int
    {
        return $this->identificationTypeId;
    }

    public function setIdentificationTypeId(?int $identificationTypeId): self
    {
        $this->identificationTypeId = $identificationTypeId;

        return $this;
    }

    public function getIdentificationNumber(): ?string
    {
        return $this->identificationNumber;
    }

    public function setIdentificationNumber(?string $identificationNumber): self
    {
        $this->identificationNumber = $identificationNumber;

        return $this;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(?string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(?int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTaxNumber(): ?string
    {
        return $this->taxNumber;
    }

    public function setTaxNumber(?string $taxNumber): self
    {
        $this->taxNumber = $taxNumber;

        return $this;
    }

    public function getHttpUserAgent(): ?string
    {
        return $this->httpUserAgent;
    }

    public function setHttpUserAgent(?string $httpUserAgent): self
    {
        $this->httpUserAgent = $httpUserAgent;

        return $this;
    }

    public function getDeviceType(): ?int
    {
        return $this->deviceType;
    }

    public function setDeviceType(?int $deviceType): self
    {
        $this->deviceType = $deviceType;

        return $this;
    }
}
