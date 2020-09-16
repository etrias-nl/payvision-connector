<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Request;

class CreateCreditRequest implements ApiAwareInterface
{
    use GenericHeaderTrait;

    /** @var null|CreateCreditBody */
    protected $body;

    public function getBody(): CreateCreditBody
    {
        return $this->body ?? ($this->body = new CreateCreditBody());
    }

    public function setBody(CreateCreditBody $body): self
    {
        $this->body = $body;

        return $this;
    }
}
