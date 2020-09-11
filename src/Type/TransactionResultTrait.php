<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

trait TransactionResultTrait
{
    use TransactionReferenceTrait;

    /** @var null|string */
    protected $action;

    /** @var null|string */
    protected $id;

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(?string $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }
}
