<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Api;

use Etrias\PayvisionConnector\Request\CreatePaymentLinkRequest;
use Etrias\PayvisionConnector\Response\PaymentLinkResponse;
use GuzzleHttp\Psr7\Uri;

class PaymentLinks extends AbstractApi
{
    public function create(CreatePaymentLinkRequest $request): PaymentLinkResponse
    {
        $uri = $this->uriFactory->createUri('/paymentlinks');
        $response = $this->postJson($uri, $request);

        return $this->deserialize($response, PaymentLinkResponse::class);
    }

    public function cancel(string $id): PaymentLinkResponse
    {
        $uri = $this->uriFactory->createUri(\GuzzleHttp\uri_template('/paymentlinks/{id}/cancel', compact('id')));
        $response = $this->postJson($uri);

        return $this->deserialize($response, PaymentLinkResponse::class);
    }

    public function get(string $id): PaymentLinkResponse
    {
        $uri = $this->uriFactory->createUri(\GuzzleHttp\uri_template('/paymentlinks/{id}', compact('id')));
        $uri = Uri::withQueryValue($uri, 'businessId', $this->options->getBusinessId());
        $response = $this->getJson($uri);

        return $this->deserialize($response, PaymentLinkResponse::class);
    }

    public function getAll(string $trackingCode): PaymentLinkResponse
    {
        $uri = $this->uriFactory->createUri('/paymentlinks');
        $uri = Uri::withQueryValue($uri, 'businessId', $this->options->getBusinessId());
        $uri = Uri::withQueryValue($uri, 'trackingCode', $trackingCode);
        $response = $this->getJson($uri);

        return $this->deserialize($response, PaymentLinkResponse::class);
    }
}
