<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Request;

use Etrias\PayvisionConnector\Api\ApiOptions;

trait GenericHeaderTrait
{
    /** @var null|GenericHeader */
    protected $header;

    public function prepareForApiRequest(ApiOptions $options): void
    {
        $header = $this->getHeader();

        if (null === $header->getBusinessId()) {
            $header->setBusinessId($options->getBusinessId());
        }
    }

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
