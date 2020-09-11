<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\HttpClient\Plugin;

use Etrias\PayvisionConnector\Exception\PayvisionException;
use Etrias\PayvisionConnector\Response\ErrorResponse;
use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use JMS\Serializer\Exception\RuntimeException;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ErrorHandler implements Plugin
{
    protected const JSON_FORMAT = 'json';

    /** @var SerializerInterface */
    protected $serializer;

    public function __construct(
        SerializerInterface $serializer
    ) {
        $this->serializer = $serializer;
    }

    /**
     * {@inheritdoc}
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        return $next($request)->then(function (ResponseInterface $response) {
            $status = $response->getStatusCode();

            if ($status >= 400) {
                $body = (string) $response->getBody();
                var_dump($body);
                die;

                if (!$body || !preg_match('/\bjson\b/i', $response->getHeaderLine('Content-Type'))) {
                    throw new PayvisionException($body ?: 'An error occurred (status '.$response->getStatusCode().').');
                }

                try {
                    /** @var ErrorResponse $data */
                    $data = $this->serializer->deserialize($body, ErrorResponse::class, self::JSON_FORMAT);
                } catch (RuntimeException $e) {
                    throw new PayvisionException('Unable to deserialize error response.');
                }

                throw new PayvisionException($data->toExceptionMessage());
            }

            return $response;
        });
    }
}
