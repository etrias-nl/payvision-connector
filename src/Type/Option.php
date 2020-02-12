<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class Option
{
    public const PAYPAL_DISPLAY_SHIPPING_ADDRESS = 0;
    public const PAYPAL_NO_DISPLAY_SHIPPING_ADDRESS = 1;
    public const PAYPAL_OBTAIN_SHIPPING_ADDRESS = 2;

    public const PROCESSING_TYPE_PAYPAL_SITE = 0;
    public const PROCESSING_TYPE_PAYPAL_EXPRESS = 1;

    /** @var null|int */
    protected $noShipping;

    /** @var null|string */
    protected $brandName;

    /** @var null|string */
    protected $cartBorderColor;

    /** @var null|string */
    protected $headerImage;

    /** @var null|int */
    protected $quantity;

    /** @var null|string */
    protected $locale;

    /** @var null|int */
    protected $processingType;

    /** @var null|int */
    protected $minAgeRestriction;

    /** @var null|string */
    protected $countryRestriction;

    public function getNoShipping(): ?int
    {
        return $this->noShipping;
    }

    public function setNoShipping(?int $noShipping): self
    {
        $this->noShipping = $noShipping;

        return $this;
    }

    public function getBrandName(): ?string
    {
        return $this->brandName;
    }

    public function setBrandName(?string $brandName): self
    {
        $this->brandName = $brandName;

        return $this;
    }

    public function getCartBorderColor(): ?string
    {
        return $this->cartBorderColor;
    }

    public function setCartBorderColor(?string $cartBorderColor): self
    {
        $this->cartBorderColor = $cartBorderColor;

        return $this;
    }

    public function getHeaderImage(): ?string
    {
        return $this->headerImage;
    }

    public function setHeaderImage(?string $headerImage): self
    {
        $this->headerImage = $headerImage;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(?string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getProcessingType(): ?int
    {
        return $this->processingType;
    }

    public function setProcessingType(?int $processingType): self
    {
        $this->processingType = $processingType;

        return $this;
    }

    public function getMinAgeRestriction(): ?int
    {
        return $this->minAgeRestriction;
    }

    public function setMinAgeRestriction(?int $minAgeRestriction): self
    {
        $this->minAgeRestriction = $minAgeRestriction;

        return $this;
    }

    public function getCountryRestriction(): ?string
    {
        return $this->countryRestriction;
    }

    public function setCountryRestriction(?string $countryRestriction): self
    {
        $this->countryRestriction = $countryRestriction;

        return $this;
    }
}
