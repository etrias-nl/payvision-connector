<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Request;

class CancelPaymentRequest implements ApiAwareInterface
{
    use GenericHeaderTrait;

    /** @var CancelPaymentBody */
    protected $body;

    public function getBody(): CancelPaymentBody
    {
        return $this->body ?? ($this->body = new CancelPaymentBody());
    }

    public function setBody(CancelPaymentBody $body): self
    {
        $this->body = $body;

        return $this;
    }
}
