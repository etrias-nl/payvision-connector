<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Request;

class CreatePaymentLinkRequest implements ApiAwareInterface
{
    use GenericHeaderTrait;

    /** @var null|CreatePaymentLinkBody */
    protected $body;

    public function getBody(): CreatePaymentLinkBody
    {
        return $this->body ?? ($this->body = new CreatePaymentLinkBody());
    }

    public function setBody(CreatePaymentLinkBody $body): self
    {
        $this->body = $body;

        return $this;
    }
}
