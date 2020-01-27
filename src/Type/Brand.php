<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class Brand
{
    /** @var null|int */
    protected $id;

    /** @var null|string */
    protected $name;

    /** @var string[] */
    protected $issuers = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getIssuers(): array
    {
        return $this->issuers;
    }

    /**
     * @param string[] $issuers
     */
    public function setIssuers(array $issuers): self
    {
        $this->issuers = $issuers;

        return $this;
    }
}
