<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

trait ResultTrait
{
    /** @var null|int */
    protected $result;

    /** @var null|string */
    protected $description;

    public function getResult(): ?int
    {
        return $this->result;
    }

    public function setResult(?int $result): self
    {
        $this->result = $result;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
