<?php

declare(strict_types=1);

namespace Tests\Etrias\PayvisionConnector\Functional\Api;

use Etrias\PayvisionConnector\Api\ApiOptions;
use Etrias\PayvisionConnector\Api\Brands;
use Etrias\PayvisionConnector\Api\PaymentLinks;
use Etrias\PayvisionConnector\Api\Payments;
use Etrias\PayvisionConnector\HttpClient\Plugin\ErrorHandler;
use Etrias\PayvisionConnector\Request\CreatePaymentLinkRequest;
use Etrias\PayvisionConnector\Request\CreatePaymentRequest;
use Etrias\PayvisionConnector\Response\PaymentLinkResponse;
use Etrias\PayvisionConnector\Type\Action;
use Etrias\PayvisionConnector\Type\Brand;
use Etrias\PayvisionConnector\Type\Link;
use Etrias\PayvisionConnector\Type\LinkTransaction;
use Etrias\PayvisionConnector\Type\Transaction;
use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Client\Common\Plugin\BaseUriPlugin;
use Http\Client\Common\Plugin\ErrorPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Message\Authentication\BasicAuth;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\TestCase;

abstract class ApiTestCase extends TestCase
{
    /** @var Brands */
    protected $brands;

    /** @var Payments */
    protected $payments;

    /** @var PaymentLinks */
    protected $paymentLinks;

    protected function setUp(): void
    {
        $serializer = SerializerBuilder::create()
            ->setCacheDir(sys_get_temp_dir().'/jms-cache')
            ->addMetadataDir(__DIR__.'/../../../src/Serializer/Metadata', 'Etrias\PayvisionConnector')
            ->addDefaultDeserializationVisitors()
            ->addDefaultSerializationVisitors()
            ->addDefaultHandlers()
            ->build()
        ;
        $client = new HttpMethodsClient(
            new PluginClient(HttpClientDiscovery::find(), [
                new ErrorPlugin(['only_server_exception' => true]),
                new ErrorHandler($serializer),
                new BaseUriPlugin(Psr17FactoryDiscovery::findUrlFactory()->createUri(getenv('PAYVISION_API_BASE_URI'))),
                new AuthenticationPlugin(new BasicAuth(getenv('PAYVISION_API_USERNAME'), getenv('PAYVISION_API_PASSWORD'))),
            ]),
            new GuzzleMessageFactory()
        );

        $apiOptions = new ApiOptions();
        $apiOptions->setBusinessId(getenv('PAYVISION_BUSINESS_ID'));

        $this->brands = new Brands($client);
        $this->payments = new Payments($client, $serializer, $apiOptions);
        $this->paymentLinks = new PaymentLinks($client, $serializer, $apiOptions);
    }

    protected function authorize(?string $trackingCode = null): string
    {
        $transaction = (new Transaction())
            ->setTrackingCode($trackingCode ?? TestData::trackingCode())
            ->setAmount(1)
            ->setCurrencyCode('EUR')
            ->setBrandId($this->brands->getByName(TestData::BRAND_VISA)->getId())
            ->setReturnUrl('http://localhost')
        ;
        $request = new CreatePaymentRequest();
        $request->setAction(Action::AUTHORIZE);
        $request->getBody()
            ->setTransaction($transaction)
            ->setCard(TestData::visaCard())
            ->setCustomer(TestData::customer())
            ->setBillingAddress(TestData::billingAddress())
            ->setShippingAddress(TestData::shippingAddress())
            ->setOrder(TestData::order())
        ;
        $response = $this->payments->create($request);

        return $response->getBody()->getTransaction()->getId();
    }

    protected function createLink(?string $trackingCode = null): PaymentLinkResponse
    {
        $transaction = (new LinkTransaction())
            ->setTrackingCode($trackingCode ?? TestData::trackingCode())
            ->setAmount(5.5)
            ->setCurrencyCode('EUR')
        ;
        $link = (new Link())
            ->setReturnUrl('http://return-url.com')
            ->setBrandIds(array_map(static function (Brand $brand): int {
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

        return $this->paymentLinks->create($request);
    }
}
