<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Request;

class CreatePaymentRequest implements ApiAwareInterface
{
    use GenericHeaderTrait;

    /** @var null|string */
    protected $action;

    /** @var CreatePaymentBody */
    protected $body;

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(?string $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getBody(): CreatePaymentBody
    {
        return $this->body ?? ($this->body = new CreatePaymentBody());
    }

    public function setBody(CreatePaymentBody $body): self
    {
        $this->body = $body;

        return $this;
    }
}
