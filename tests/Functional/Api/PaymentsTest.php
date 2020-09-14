<?php

declare(strict_types=1);

namespace Tests\Etrias\PayvisionConnector\Functional\Api;

use Etrias\PayvisionConnector\Exception\PayvisionException;
use Etrias\PayvisionConnector\Request\CancelPaymentRequest;
use Etrias\PayvisionConnector\Request\CapturePaymentRequest;
use Etrias\PayvisionConnector\Request\RefundPaymentRequest;
use Etrias\PayvisionConnector\Type\Action;
use Etrias\PayvisionConnector\Type\CancelTransaction;
use Etrias\PayvisionConnector\Type\CaptureTransaction;
use Etrias\PayvisionConnector\Type\RefundTransaction;
use Etrias\PayvisionConnector\Type\ResultCode;

/**
 * @internal
 */
final class PaymentsTest extends ApiTestCase
{
    public function testCreate(): void
    {
        $payment = $this->createPayment($trackingCode = TestData::trackingCode());
        $body = $payment->getBody();

        self::assertSame(ResultCode::PENDING, $payment->getResult());
        self::assertSame($trackingCode, $body->getTransaction()->getTrackingCode());
        self::assertSame(Action::PAYMENT, $body->getTransaction()->getAction());
        self::assertIsString($body->getTransaction()->getId());
        self::assertIsString($body->getRedirect()->getUrl());
        self::assertNotEmpty($body->getRedirect()->getFields());
    }

    public function testCapture(): void
    {
        $id = $this->createPayment(null, Action::AUTHORIZE)->getBody()->getTransaction()->getId();
        $transaction = (new CaptureTransaction())
            ->setAmount(5.5)
            ->setCurrencyCode('EUR')
            ->setTrackingCode(TestData::trackingCode())
        ;
        $request = new CapturePaymentRequest();
        $request->getBody()
            ->setTransaction($transaction)
        ;

        $this->expectException(PayvisionException::class);
        $this->expectExceptionMessageMatches('/'.preg_quote('the operation needs at least one successful previous transaction').'/');
        $this->payments->capture($id, $request);
    }

    public function testCancel(): void
    {
        $id = $this->createPayment(null, Action::AUTHORIZE)->getBody()->getTransaction()->getId();
        $transaction = (new CancelTransaction())
            ->setTrackingCode(TestData::trackingCode())
        ;
        $request = new CancelPaymentRequest();
        $request->getBody()
            ->setTransaction($transaction)
        ;

        $this->expectException(PayvisionException::class);
        $this->expectExceptionMessageMatches('/'.preg_quote('the operation needs at least one successful previous transaction').'/');
        $this->payments->cancel($id, $request);
    }

    public function testRefund(): void
    {
        $id = $this->createPayment(null, Action::AUTHORIZE)->getBody()->getTransaction()->getId();
        $transaction = (new RefundTransaction())
            ->setAmount(1)
            ->setCurrencyCode('EUR')
            ->setTrackingCode(TestData::trackingCode())
        ;
        $request = new RefundPaymentRequest();
        $request->getBody()
            ->setTransaction($transaction)
        ;

        $this->expectException(PayvisionException::class);
        $this->expectExceptionMessageMatches('/'.preg_quote('the operation needs at least one successful previous transaction').'/');
        $this->payments->refund($id, $request);
    }

    public function testGet(): void
    {
        $response = $this->payments->get($id = $this->createPayment()->getBody()->getTransaction()->getId());
        $body = $response->getBody();

        self::assertSame(ResultCode::PENDING, $response->getResult());
        self::assertSame($id, $body->getTransaction()->getId());
    }

    public function testGetAll(): void
    {
        $id = $this->createPayment($trackingCode = TestData::trackingCode())->getBody()->getTransaction()->getId();

        $responses = $this->payments->getAll($trackingCode);
        $response = reset($responses);
        $body = $response->getBody();

        self::assertCount(1, $responses);
        self::assertSame(ResultCode::PENDING, $response->getResult());
        self::assertSame($id, $body->getTransaction()->getId());
    }
}
