<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Api;

use Etrias\PayvisionConnector\Request\CancelPaymentRequest;
use Etrias\PayvisionConnector\Request\CapturePaymentRequest;
use Etrias\PayvisionConnector\Request\CreatePaymentRequest;
use Etrias\PayvisionConnector\Request\RefundPaymentRequest;
use Etrias\PayvisionConnector\Response\PaymentResponse;
use GuzzleHttp\Psr7\Uri;

class Payments extends AbstractApi
{
    public function create(CreatePaymentRequest $request): PaymentResponse
    {
        $uri = $this->uriFactory->createUri('/payments');
        $response = $this->postJson($uri, $request);

        return $this->deserialize($response, PaymentResponse::class);
    }

    public function capture(string $id, CapturePaymentRequest $request): PaymentResponse
    {
        $uri = $this->uriFactory->createUri(\GuzzleHttp\uri_template('/payments/{id}/capture', compact('id')));
        $response = $this->postJson($uri, $request);

        return $this->deserialize($response, PaymentResponse::class);
    }

    public function cancel(string $id, CancelPaymentRequest $request): PaymentResponse
    {
        $uri = $this->uriFactory->createUri(\GuzzleHttp\uri_template('/payments/{id}/cancel', compact('id')));
        $response = $this->postJson($uri, $request);

        return $this->deserialize($response, PaymentResponse::class);
    }

    public function refund(string $id, RefundPaymentRequest $request): PaymentResponse
    {
        $uri = $this->uriFactory->createUri(\GuzzleHttp\uri_template('/payments/{id}/refund', compact('id')));
        $response = $this->postJson($uri, $request);

        return $this->deserialize($response, PaymentResponse::class);
    }

    public function get(string $id): PaymentResponse
    {
        $uri = $this->uriFactory->createUri(\GuzzleHttp\uri_template('/payments/{id}', compact('id')));
        $uri = Uri::withQueryValue($uri, 'businessId', $this->options->getBusinessId());
        $response = $this->getJson($uri);

        return $this->deserialize($response, PaymentResponse::class);
    }

    /**
     * @return PaymentResponse[]
     */
    public function getAll(string $trackingCode): array
    {
        $uri = $this->uriFactory->createUri('/payments');
        $uri = Uri::withQueryValue($uri, 'businessId', $this->options->getBusinessId());
        $uri = Uri::withQueryValue($uri, 'trackingCode', $trackingCode);
        $response = $this->getJson($uri);

        return $this->deserializeList($response, PaymentResponse::class);
    }
}
