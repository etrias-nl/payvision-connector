<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class OrderLine
{
    /** @var null|string */
    protected $productName;

    /** @var null|string */
    protected $productCode;

    /** @var null|string */
    protected $description;

    /** @var null|float|int|string */
    protected $itemAmount;

    /** @var null|int */
    protected $quantity;

    /** @var null|float|int|string */
    protected $totalAmount;

    /** @var null|float|int|string */
    protected $taxPercentage;

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(?string $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    public function getProductCode(): ?string
    {
        return $this->productCode;
    }

    public function setProductCode(?string $productCode): self
    {
        $this->productCode = $productCode;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return null|float|int|string
     */
    public function getItemAmount()
    {
        return $this->itemAmount;
    }

    /**
     * @param null|float|int|string $itemAmount
     */
    public function setItemAmount($itemAmount): self
    {
        $this->itemAmount = $itemAmount;

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

    /**
     * @return null|float|int|string
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @param null|float|int|string $totalAmount
     */
    public function setTotalAmount($totalAmount): self
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * @return null|float|int|string
     */
    public function getTaxPercentage()
    {
        return $this->taxPercentage;
    }

    /**
     * @param null|float|int|string $taxPercentage
     */
    public function setTaxPercentage($taxPercentage): self
    {
        $this->taxPercentage = $taxPercentage;

        return $this;
    }
}
