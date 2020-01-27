<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Response;

use Etrias\PayvisionConnector\Type\Error;

class ErrorBody
{
    /** @var null|Error */
    protected $error;

    public function getError(): ?Error
    {
        return $this->error;
    }

    public function setError(?Error $error): self
    {
        $this->error = $error;

        return $this;
    }
}
