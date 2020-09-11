<?php

declare(strict_types=1);

namespace Tests\Etrias\PayvisionConnector\Functional\Api;

use Etrias\PayvisionConnector\Exception\PayvisionException;
use Etrias\PayvisionConnector\Request\CancelPaymentRequest;
use Etrias\PayvisionConnector\Request\CapturePaymentRequest;
use Etrias\PayvisionConnector\Request\CreatePaymentRequest;
use Etrias\PayvisionConnector\Request\RefundPaymentRequest;
use Etrias\PayvisionConnector\Type\Action;
use Etrias\PayvisionConnector\Type\CancelTransaction;
use Etrias\PayvisionConnector\Type\CaptureTransaction;
use Etrias\PayvisionConnector\Type\RefundTransaction;
use Etrias\PayvisionConnector\Type\ResultCode;
use Etrias\PayvisionConnector\Type\Transaction;

/**
 * @internal
 */
final class PaymentsTest extends ApiTestCase
{
    public function testCreate(): void
    {
        $transaction = (new Transaction())
            ->setTrackingCode($trackingCode = TestData::trackingCode())
            ->setAmount(5.5)
            ->setCurrencyCode('EUR')
            ->setBrandId(TestData::BRAND_ID_SEPA)
            ->setPurchaseId('test')
            ->setReturnUrl('http://return-url.com')
        ;
        $request = new CreatePaymentRequest();
        $request->setAction(Action::PAYMENT);
        $request->getBody()
            ->setTransaction($transaction)
            ->setBank(TestData::bank())
            ->setCustomer(TestData::customer())
            ->setBillingAddress(TestData::billingAddress())
            ->setShippingAddress(TestData::shippingAddress())
            ->setOrder(TestData::order())
        ;
        $response = $this->payments->create($request);
        $body = $response->getBody();

        self::assertSame(ResultCode::PENDING, $response->getResult());
        self::assertSame($trackingCode, $body->getTransaction()->getTrackingCode());
        self::assertSame(Action::PAYMENT, $body->getTransaction()->getAction());
        self::assertIsString($body->getTransaction()->getId());
        self::assertIsString($body->getRedirect()->getUrl());
        self::assertNotEmpty($body->getRedirect()->getFields());
    }

    public function testCapture(): void
    {
        $id = $this->authorize();
        $transaction = new CaptureTransaction();
        $transaction
            ->setAmount(5.5)
            ->setCurrencyCode('EUR')
            ->setTrackingCode(TestData::trackingCode())
        ;
        $request = new CapturePaymentRequest();
        $request->getBody()
            ->setTransaction($transaction)
        ;

        $this->expectException(PayvisionException::class);
        $this->payments->capture($id, $request);
    }

    public function testCancel(): void
    {
        $id = $this->authorize();
        $transaction = new CancelTransaction();
        $transaction
            ->setTrackingCode(TestData::trackingCode())
        ;
        $request = new CancelPaymentRequest();
        $request->getBody()
            ->setTransaction($transaction)
        ;

        $this->expectException(PayvisionException::class);
        $this->payments->cancel($id, $request);
    }

    public function testRefund(): void
    {
        $id = $this->authorize();
        $transaction = new RefundTransaction();
        $transaction
            ->setTrackingCode(TestData::trackingCode())
            ->setAmount(1)
            ->setCurrencyCode('EUR')
        ;
        $request = new RefundPaymentRequest();
        $request->getBody()
            ->setTransaction($transaction)
        ;

        $this->expectException(PayvisionException::class);
        $this->payments->refund($id, $request);
    }

    public function testGet(): void
    {
        $response = $this->payments->get($id = $this->authorize());
        $body = $response->getBody();

        self::assertSame(ResultCode::PENDING, $response->getResult());
        self::assertSame($id, $body->getTransaction()->getId());
    }

    public function testGetAll(): void
    {
        $id = $this->authorize($trackingCode = TestData::trackingCode());

        $responses = $this->payments->getAll($trackingCode);
        $response = reset($responses);
        $body = $response->getBody();

        self::assertCount(1, $responses);
        self::assertSame(ResultCode::PENDING, $response->getResult());
        self::assertSame($id, $body->getTransaction()->getId());
    }
}
