<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

trait TransactionTrait
{
    use TransactionReferenceTrait;

    /** @var null|int */
    protected $storeId;

    /** @var null|string */
    protected $invoiceId;

    /** @var null|string */
    protected $purchaseId;

    /** @var null|string */
    protected $countryCode;

    /** @var null|int */
    protected $brandId;

    public function getStoreId(): ?int
    {
        return $this->storeId;
    }

    public function setStoreId(?int $storeId): self
    {
        $this->storeId = $storeId;

        return $this;
    }

    public function getInvoiceId(): ?string
    {
        return $this->invoiceId;
    }

    public function setInvoiceId(?string $invoiceId): self
    {
        $this->invoiceId = $invoiceId;

        return $this;
    }

    public function getPurchaseId(): ?string
    {
        return $this->purchaseId;
    }

    public function setPurchaseId(?string $purchaseId): self
    {
        $this->purchaseId = $purchaseId;

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
}
