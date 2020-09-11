<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

abstract class Action
{
    public const PAYMENT = 'payment';
    public const AUTHORIZE = 'authorize';
    public const CREDIT = 'credit';
}
