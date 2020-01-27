<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Response;

trait GenericHeaderTrait
{
    /** @var null|GenericHeader */
    protected $header;

    public function getHeader(): GenericHeader
    {
        return $this->header ?? ($this->header = new GenericHeader());
    }

    public function setHeader(GenericHeader $header): self
    {
        $this->header = $header;

        return $this;
    }
}
