<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class TokenReference
{
    /** @var null|string */
    protected $token;

    /** @var null|string */
    protected $displayHint;

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getDisplayHint(): ?string
    {
        return $this->displayHint;
    }

    public function setDisplayHint(?string $displayHint): self
    {
        $this->displayHint = $displayHint;

        return $this;
    }
}
