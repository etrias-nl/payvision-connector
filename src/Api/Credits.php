<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Api;

use Etrias\PayvisionConnector\Request\CreateCreditRequest;
use Etrias\PayvisionConnector\Response\CreditResponse;

class Credits extends AbstractApi
{
    public function create(CreateCreditRequest $request): CreditResponse
    {
        $uri = $this->uriFactory->createUri('/credits');
        $response = $this->postJson($uri, $request);

        return $this->deserialize($response, CreditResponse::class);
    }

//    public function get(string $id): PaymentLinkResponse
//    {
//        $uri = $this->uriFactory->createUri(\GuzzleHttp\uri_template('/credits/{id}', compact('id')));
//        $uri = Uri::withQueryValue($uri, 'businessId', $this->options->getBusinessId());
//        $response = $this->getJson($uri);
//
//        return $this->deserialize($response, PaymentLinkResponse::class);
//    }
//
//    public function getAll(string $trackingCode): PaymentLinkResponse
//    {
//        $uri = $this->uriFactory->createUri('/credits');
//        $uri = Uri::withQueryValue($uri, 'businessId', $this->options->getBusinessId());
//        $uri = Uri::withQueryValue($uri, 'trackingCode', $trackingCode);
//        $response = $this->getJson($uri);
//
//        return $this->deserialize($response, PaymentLinkResponse::class);
//    }
}
