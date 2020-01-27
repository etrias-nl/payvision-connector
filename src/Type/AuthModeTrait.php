<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

trait AuthModeTrait
{
    /** @var string */
    protected $authorizationMode = AuthMode::PAYMENT;

    public function getAuthorizationMode(): string
    {
        return $this->authorizationMode;
    }

    public function setAuthorizationMode(string $authorizationMode): self
    {
        $this->authorizationMode = $authorizationMode;

        return $this;
    }
}
