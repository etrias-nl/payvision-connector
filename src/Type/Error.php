<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class Error
{
    /** @var null|int */
    protected $code;

    /** @var null|string */
    protected $message;

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(?int $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
