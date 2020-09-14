<?php

declare(strict_types=1);

namespace Tests\Etrias\PayvisionConnector\Functional\Api;

use Etrias\PayvisionConnector\Exception\PayvisionException;
use Etrias\PayvisionConnector\Type\Action;
use Etrias\PayvisionConnector\Type\ResultCode;

/**
 * @internal
 */
final class CreditsTest extends ApiTestCase
{
    public function testCreate(): void
    {
        $credit = $this->createCredit($trackingCode = TestData::trackingCode());
        $body = $credit->getBody();

        self::assertSame(ResultCode::WAITING, $credit->getResult());
        self::assertSame($trackingCode, $body->getTransaction()->getTrackingCode());
        self::assertSame(Action::CREDIT, $body->getTransaction()->getAction());
        self::assertIsString($body->getTransaction()->getId());
        self::assertIsString($body->getBank()->getIban());
    }

    public function testGet(): void
    {
        $credit = $this->createCredit();
        $response = $this->credits->get($id = $credit->getBody()->getTransaction()->getId());
        $body = $response->getBody();

        self::assertSame(ResultCode::WAITING, $response->getResult());
        self::assertSame($id, $body->getTransaction()->getId());
        self::assertSame(Action::CREDIT, $body->getTransaction()->getAction());
        self::assertSame($credit->getBody()->getTransaction()->getTrackingCode(), $body->getTransaction()->getTrackingCode());
    }

    public function testGetWithUnknownId(): void
    {
        $this->expectException(PayvisionException::class);

        $this->credits->get('unknown');
    }

    public function testGetByTrackingCode(): void
    {
        $credit = $this->createCredit();
        $response = $this->credits->getByTrackingCode($trackingCode = $credit->getBody()->getTransaction()->getTrackingCode());
        $body = $response->getBody();

        self::assertSame(ResultCode::WAITING, $response->getResult());
        self::assertIsString($body->getTransaction()->getId());
        self::assertSame(Action::CREDIT, $body->getTransaction()->getAction());
        self::assertSame($trackingCode, $body->getTransaction()->getTrackingCode());
    }
}
