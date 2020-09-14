<?php

declare(strict_types=1);

namespace Tests\Etrias\PayvisionConnector\Functional\Api;

use Etrias\PayvisionConnector\Exception\PayvisionException;
use Etrias\PayvisionConnector\Type\LinkReference;
use Etrias\PayvisionConnector\Type\ResultCode;

/**
 * @internal
 */
final class PaymentLinksTest extends ApiTestCase
{
    public function testCreate(): void
    {
        $link = $this->createLink($trackingCode = TestData::trackingCode());
        $body = $link->getBody();

        self::assertSame(ResultCode::OK, $link->getResult());
        self::assertIsString($body->getLink()->getLinkId());
        self::assertSame(LinkReference::STATUS_READY, $body->getLink()->getStatus());
        self::assertSame($trackingCode, $body->getTransaction()->getTrackingCode());
    }

    public function testCancel(): void
    {
        $link = $this->createLink();

        $this->expectException(PayvisionException::class);
        $this->paymentLinks->cancel($link->getBody()->getLink()->getLinkId());
    }

    public function testCancelWithUnknownId(): void
    {
        $this->expectException(PayvisionException::class);

        $this->paymentLinks->cancel('unknown');
    }

    public function testGet(): void
    {
        $link = $this->createLink();
        $response = $this->paymentLinks->get($id = $link->getBody()->getLink()->getLinkId());
        $body = $response->getBody();

        self::assertSame(ResultCode::OK, $response->getResult());
        self::assertSame($id, $body->getLink()->getLinkId());
        self::assertSame(LinkReference::STATUS_READY, $body->getLink()->getStatus());
        self::assertSame($link->getBody()->getTransaction()->getTrackingCode(), $body->getTransaction()->getTrackingCode());
    }

    public function testGetWithUnknownId(): void
    {
        $this->expectException(PayvisionException::class);

        $this->paymentLinks->get('unknown');
    }

    public function testGetAll(): void
    {
        $link = $this->createLink();
        $response = $this->paymentLinks->getAll($trackingCode = $link->getBody()->getTransaction()->getTrackingCode());
        $body = $response->getBody();

        self::assertSame(ResultCode::OK, $response->getResult());
        self::assertIsString($body->getLink()->getLinkId());
        self::assertSame(LinkReference::STATUS_READY, $body->getLink()->getStatus());
        self::assertSame($trackingCode, $body->getTransaction()->getTrackingCode());
    }
}
