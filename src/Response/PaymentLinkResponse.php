<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Response;

use Etrias\PayvisionConnector\Type\ResultTrait;

class PaymentLinkResponse
{
    use ResultTrait;
    use GenericHeaderTrait;

    /** @var null|PaymentLinkBody */
    protected $body;

    public function getBody(): PaymentLinkBody
    {
        return $this->body ?? ($this->body = new PaymentLinkBody());
    }

    public function setBody(PaymentLinkBody $body): self
    {
        $this->body = $body;

        return $this;
    }
}
