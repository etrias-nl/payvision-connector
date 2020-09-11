<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Request;

use Etrias\PayvisionConnector\Type\Action;

class CreateCreditRequest implements ApiAwareInterface
{
    use GenericHeaderTrait;

    /** @var null|string */
    protected $action = Action::CREDIT;

    /** @var null|CreateCreditBody */
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
