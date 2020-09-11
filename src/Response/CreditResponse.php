<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Response;

use Etrias\PayvisionConnector\Type\ResultTrait;

class CreditResponse
{
    use ResultTrait;
    use GenericHeaderTrait;

    /** @var null|CreditBody */
    protected $body;

    public function getBody(): CreditBody
    {
        return $this->body ?? ($this->body = new CreditBody());
    }

    public function setBody(CreditBody $body): self
    {
        $this->body = $body;

        return $this;
    }
}
