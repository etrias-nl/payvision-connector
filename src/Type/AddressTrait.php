<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

trait AddressTrait
{
    /** @var null|string */
    protected $street;

    /** @var null|string */
    protected $houseNumber;

    /** @var null|string */
    protected $houseNumberSuffix;

    /** @var null|string */
    protected $streetInfo;

    /** @var null|string */
    protected $city;

    /** @var null|string */
    protected $stateCode;

    /** @var null|string */
    protected $zip;

    /** @var null|string */
    protected $countryCode;

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getHouseNumber(): ?string
    {
        return $this->houseNumber;
    }

    public function setHouseNumber(?string $houseNumber): self
    {
        $this->houseNumber = $houseNumber;

        return $this;
    }

    public function getHouseNumberSuffix(): ?string
    {
        return $this->houseNumberSuffix;
    }

    public function setHouseNumberSuffix(?string $houseNumberSuffix): self
    {
        $this->houseNumberSuffix = $houseNumberSuffix;

        return $this;
    }

    public function getStreetInfo(): ?string
    {
        return $this->streetInfo;
    }

    public function setStreetInfo(?string $streetInfo): self
    {
        $this->streetInfo = $streetInfo;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getStateCode(): ?string
    {
        return $this->stateCode;
    }

    public function setStateCode(?string $stateCode): self
    {
        $this->stateCode = $stateCode;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(?string $zip): self
    {
        $this->zip = $zip;

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
}
