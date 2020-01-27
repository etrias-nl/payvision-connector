<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Request;

use Etrias\PayvisionConnector\Type\Link;
use Etrias\PayvisionConnector\Type\LinkTransaction;

class CreatePaymentLinkBody
{
    use PaymentBodyTrait;

    /** @var null|LinkTransaction */
    protected $transaction;

    /** @var null|Link */
    protected $link;

    public function getTransaction(): ?LinkTransaction
    {
        return $this->transaction;
    }

    public function setTransaction(?LinkTransaction $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }

    public function getLink(): ?Link
    {
        return $this->link;
    }

    public function setLink(?Link $link): self
    {
        $this->link = $link;

        return $this;
    }
}
