<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class LinkReference
{
    use LinkTrait;

    public const STATUS_READY = 'READY';
    public const STATUS_PAID = 'PAID';
    public const STATUS_CANCELLED = 'CANCELLED';
    public const STATUS_DECLINED_BY_CUSTOMER = 'DECLINEDBYCUSTOMER';
    public const STATUS_EXPIRED = 'EXPIRED';
    public const STATUS_PENDING = 'PENDING';

    /** @var null|string */
    protected $linkId;

    /** @var null|string */
    protected $status;

    /** @var null|Redirect */
    protected $redirect;

    public function getLinkId(): ?string
    {
        return $this->linkId;
    }

    public function setLinkId(?string $linkId): self
    {
        $this->linkId = $linkId;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getRedirect(): ?Redirect
    {
        return $this->redirect;
    }

    public function setRedirect(?Redirect $redirect): self
    {
        $this->redirect = $redirect;

        return $this;
    }
}
