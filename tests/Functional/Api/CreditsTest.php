<?php

declare(strict_types=1);

namespace Tests\Etrias\PayvisionConnector\Functional\Api;

use Etrias\PayvisionConnector\Request\CreateCreditRequest;
use Etrias\PayvisionConnector\Type\CreditTransaction;

/**
 * @internal
 */
final class CreditsTest extends ApiTestCase
{
    public function testCreate(): void
    {
        $transaction = (new CreditTransaction())
            ->setTrackingCode($trackingCode = TestData::trackingCode())
            ->setAmount(5.5)
            ->setCurrencyCode('EUR')
            ->setBrandId(TestData::BRAND_ID_SEPA)
        ;
        $request = new CreateCreditRequest();
        $request->getBody()
            ->setTransaction($transaction)
            ->setBank(TestData::bankReference())
            ->setCustomer(TestData::customer())
        ;
        $response = $this->credits->create($request);
        var_dump($response);
        die;
        $body = $response->getBody();

//        self::assertSame(ResultCode::OK, $response->getResult());
//        self::assertIsString($body->getLink()->getLinkId());
//        self::assertSame(LinkReference::STATUS_READY, $body->getLink()->getStatus());
//        self::assertSame($trackingCode, $body->getTransaction()->getTrackingCode());
    }

//    public function testGet(): void
//    {
//        $link = $this->createLink();
//        $response = $this->paymentLinks->get($id = $link->getBody()->getLink()->getLinkId());
//        $body = $response->getBody();
//
//        self::assertSame(ResultCode::OK, $response->getResult());
//        self::assertSame($id, $body->getLink()->getLinkId());
//        self::assertSame(LinkReference::STATUS_READY, $body->getLink()->getStatus());
//        self::assertSame($link->getBody()->getTransaction()->getTrackingCode(), $body->getTransaction()->getTrackingCode());
//    }
//
//    public function testGetWithUnknownId(): void
//    {
//        $this->expectException(PayvisionException::class);
//
//        $this->paymentLinks->get('unknown');
//    }
//
//    public function testGetAll(): void
//    {
//        $link = $this->createLink();
//        $response = $this->paymentLinks->getAll($trackingCode = $link->getBody()->getTransaction()->getTrackingCode());
//        $body = $response->getBody();
//
//        self::assertSame(ResultCode::OK, $response->getResult());
//        self::assertIsString($body->getLink()->getLinkId());
//        self::assertSame(LinkReference::STATUS_READY, $body->getLink()->getStatus());
//        self::assertSame($trackingCode, $body->getTransaction()->getTrackingCode());
//    }
}
