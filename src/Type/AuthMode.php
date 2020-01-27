<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

abstract class AuthMode
{
    public const AUTHORIZE = 'authorize';
    public const PAYMENT = 'payment';
}
