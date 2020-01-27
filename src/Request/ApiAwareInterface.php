<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Request;

use Etrias\PayvisionConnector\Api\ApiOptions;

interface ApiAwareInterface
{
    public function prepareForApiRequest(ApiOptions $options): void;
}
