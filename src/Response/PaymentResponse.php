<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Response;

use Etrias\PayvisionConnector\Type\ResultTrait;

class PaymentResponse
{
    use ResultTrait;

    /** @var GenericHeader */
    protected $header;

    /** @var PaymentBody */
    protected $body;

    public function __construct()
    {
        $this->header = new GenericHeader();
        $this->body = new PaymentBody();
    }

    public function getHeader(): GenericHeader
    {
        return $this->header;
    }

    public function setHeader(GenericHeader $header): self
    {
        $this->header = $header;

        return $this;
    }

    public function getBody(): PaymentBody
    {
        return $this->body;
    }

    public function setBody(PaymentBody $body): self
    {
        $this->body = $body;

        return $this;
    }
}
