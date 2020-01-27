<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

trait RequestInfoTrait
{
    /** @var null|\DateTime */
    protected $requestTimestamp;

    /** @var null|string */
    protected $requestCode;

    public function getRequestTimestamp(): ?\DateTime
    {
        return $this->requestTimestamp;
    }

    public function setRequestTimestamp(?\DateTime $requestTimestamp): self
    {
        $this->requestTimestamp = $requestTimestamp;

        return $this;
    }

    public function getRequestCode(): ?string
    {
        return $this->requestCode;
    }

    public function setRequestCode(?string $requestCode): self
    {
        $this->requestCode = $requestCode;

        return $this;
    }
}
