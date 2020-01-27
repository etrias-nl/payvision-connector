<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class Redirect
{
    /** @var null|string */
    protected $method;

    /** @var null|string */
    protected $url;

    /** @var array */
    protected $fields = [];

    public function getMethod(): ?string
    {
        return $this->method;
    }

    public function setMethod(?string $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function setFields(array $fields): self
    {
        $this->fields = $fields;

        return $this;
    }
}
