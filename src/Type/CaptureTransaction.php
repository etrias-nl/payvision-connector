<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class CaptureTransaction
{
    use TransactionReferenceTrait;

    /** @var null|string */
    protected $invoiceId;

    public function getInvoiceId(): ?string
    {
        return $this->invoiceId;
    }

    public function setInvoiceId(?string $invoiceId): self
    {
        $this->invoiceId = $invoiceId;

        return $this;
    }
}
