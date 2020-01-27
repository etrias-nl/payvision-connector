<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Request;

class RefundPaymentRequest implements ApiAwareInterface
{
    use GenericHeaderTrait;

    /** @var RefundPaymentBody */
    protected $body;

    public function getBody(): RefundPaymentBody
    {
        return $this->body ?? ($this->body = new RefundPaymentBody());
    }

    public function setBody(RefundPaymentBody $body): self
    {
        $this->body = $body;

        return $this;
    }
}
