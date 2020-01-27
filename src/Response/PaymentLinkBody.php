<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Response;

use Etrias\PayvisionConnector\Type\LinkReference;
use Etrias\PayvisionConnector\Type\LinkTransactionReference;

class PaymentLinkBody
{
    /** @var null|LinkReference */
    protected $link;

    /** @var null|LinkTransactionReference */
    protected $transaction;

    public function getLink(): ?LinkReference
    {
        return $this->link;
    }

    public function setLink(?LinkReference $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getTransaction(): ?LinkTransactionReference
    {
        return $this->transaction;
    }

    public function setTransaction(?LinkTransactionReference $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }
}
