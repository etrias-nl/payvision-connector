<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class TransactionReference
{
    use TransactionResultTrait;

    /** @var null|string */
    protected $parentId;

    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    public function setParentId(?string $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }
}
