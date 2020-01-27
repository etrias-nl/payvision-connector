<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Request;

class CapturePaymentRequest implements ApiAwareInterface
{
    use GenericHeaderTrait;

    /** @var CapturePaymentBody */
    protected $body;

    public function getBody(): CapturePaymentBody
    {
        return $this->body ?? ($this->body = new CapturePaymentBody());
    }

    public function setBody(CapturePaymentBody $body): self
    {
        $this->body = $body;

        return $this;
    }
}
