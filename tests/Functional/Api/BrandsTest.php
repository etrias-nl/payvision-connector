<?php

declare(strict_types=1);

namespace Tests\Etrias\PayvisionConnector\Functional\Api;

/**
 * @internal
 */
final class BrandsTest extends ApiTestCase
{
    public function testGetAll(): void
    {
        $brands = $this->brands->getAll();

        self::assertNotEmpty($brands);

        foreach ($brands as $brand) {
            self::assertIsInt($brand->getId());
            self::assertIsString($brand->getName());

            if (TestData::BRAND_IDEAL === $brand->getName()) {
                self::assertNotEmpty($brand->getIssuers());
            } else {
                self::assertEmpty($brand->getIssuers());
            }
        }
    }

    public function testGetByName(): void
    {
        $brand = $this->brands->getByName(TestData::BRAND_IDEAL);

        self::assertSame(TestData::BRAND_IDEAL, $brand->getName());
    }
}
