<?php

declare(strict_types=1);

namespace Tests\Etrias\PayvisionConnector\Functional\Api;

use Etrias\PayvisionConnector\Exception\PayvisionException;
use Etrias\PayvisionConnector\Request\CreatePaymentLinkRequest;
use Etrias\PayvisionConnector\Type\Brand;
use Etrias\PayvisionConnector\Type\Link;
use Etrias\PayvisionConnector\Type\LinkReference;
use Etrias\PayvisionConnector\Type\LinkTransaction;
use Etrias\PayvisionConnector\Type\ResultCode;

/**
 * @internal
 */
final class CreditsTest extends ApiTestCase
{
    public function testCreate(): void
    {
        $transaction = (new LinkTransaction())
            ->setTrackingCode($trackingCode = TestData::trackingCode())
            ->setAmount(5.5)
            ->setCurrencyCode('EUR')
        ;
        $link = (new Link())
            ->setReturnUrl('http://return-url.com')
            ->setBrandIds($brandIds = array_map(static function (Brand $brand): int {
                return $brand->getId();
            }, $this->brands->getAll()))
        ;
        $request = new CreatePaymentLinkRequest();
        $request->getBody()
            ->setTransaction($transaction)
            ->setLink($link)
            ->setCustomer(TestData::customer())
            ->setBillingAddress(TestData::billingAddress())
            ->setShippingAddress(TestData::shippingAddress())
            ->setOrder(TestData::order())
        ;
        $response = $this->paymentLinks->create($request);
        $body = $response->getBody();

        self::assertSame(ResultCode::OK, $response->getResult());
        self::assertIsString($body->getLink()->getLinkId());
        self::assertSame(LinkReference::STATUS_READY, $body->getLink()->getStatus());
        self::assertSame($trackingCode, $body->getTransaction()->getTrackingCode());
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
