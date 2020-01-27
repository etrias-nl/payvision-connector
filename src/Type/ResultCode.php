<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

abstract class ResultCode
{
    public const TIMEOUT = 4;
    public const PENDING_MERCHANT = 3;
    public const PENDING = 2;
    public const WAITING = 1;
    public const OK = 0;
    public const INPUT_ERROR = -1;
    public const FAILED = -2;
    public const FAILED_RETRYABLE = -3;
    public const DECLINED = -4;
    public const DECLINED_RETRYABLE = -5;
    public const SECURITY_ERROR = -6;
    public const INTERNAL_SERVER_ERROR = -7;
    public const BUSINESS_RULE_ERROR = -8;
    public const FRAUD = -9;
    public const CUSTOMER_PROCESSING_ERROR = -10;
    public const REFERRALS = -11;
    public const STATUS_UNAVAILABLE = -12;
}
