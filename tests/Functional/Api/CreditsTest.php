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
            ->setStoreId(1)
            ->setTrackingCode('ET194744')
            ->setAmount(1)
            ->setCurrencyCode('EUR')
            ->setBrandId(TestData::BRAND_ID_SEPA)
            ->setCountryCode('NL')
        ;
        $request = new CreateCreditRequest();
        $request->getBody()
            ->setTransaction($transaction)
            ->setBank(TestData::bankReference())
            ->setCustomer(TestData::customer())
        ;
        $this->credits->create($request);
    }
}
