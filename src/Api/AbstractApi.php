<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Api;

use Etrias\PayvisionConnector\Request\ApiAwareInterface;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Discovery\Psr17FactoryDiscovery;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\UriInterface;

abstract class AbstractApi
{
    protected const JSON_FORMAT = 'json';
    protected const JSON_CONTENT_TYPE = 'application/json';

    /** @var HttpMethodsClientInterface */
    protected $client;

    /** @var SerializerInterface */
    protected $serializer;

    /** @var ApiOptions */
    protected $options;

    /** @var UriFactoryInterface */
    protected $uriFactory;

    public function __construct(
        HttpMethodsClientInterface $client,
        SerializerInterface $serializer,
        ?ApiOptions $options = null,
        ?UriFactoryInterface $uriFactory = null
    ) {
        $this->client = $client;
        $this->serializer = $serializer;
        $this->options = $options ?? new ApiOptions();
        $this->uriFactory = $uriFactory ?? Psr17FactoryDiscovery::findUrlFactory();
    }

    protected function postJson(UriInterface $uri, ?object $data = null): ResponseInterface
    {
        if ($data instanceof ApiAwareInterface) {
            $data->prepareForApiRequest($this->options);
        }

        return $this->client->post(
            $uri,
            [
                'Accept' => self::JSON_CONTENT_TYPE,
                'Content-Type' => self::JSON_CONTENT_TYPE,
            ],
            null === $data ? null : $this->serializer->serialize($data, self::JSON_FORMAT)
        );
    }

    protected function getJson(UriInterface $uri): ResponseInterface
    {
        return $this->client->get(
            $uri,
            [
                'Accept' => self::JSON_CONTENT_TYPE,
            ]
        );
    }

    protected function deserialize(ResponseInterface $response, string $type): object
    {
        return $this->serializer->deserialize((string) $response->getBody(), $type, self::JSON_FORMAT);
    }

    /**
     * @return object[]
     */
    protected function deserializeList(ResponseInterface $response, string $type): array
    {
        return $this->serializer->deserialize((string) $response->getBody(), 'array<'.$type.'>', self::JSON_FORMAT);
    }
}
