<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Api;

use Etrias\PayvisionConnector\Exception\PayvisionException;
use Etrias\PayvisionConnector\Type\Brand;

class Brands
{
    /** @var null|array */
    protected $brands;

    /**
     * @return Brand[]
     */
    public function getAll(): array
    {
        if (null !== $this->brands) {
            return $this->brands;
        }

        $xml = simplexml_load_file(\dirname(__DIR__, 2).'/data/brands.xml');
        $this->brands = [];

        foreach ($xml->category as $categoryNode) {
            foreach ($categoryNode->brand as $brandNode) {
                $issuers = [];
                if (isset($brandNode->issuers[0])) {
                    foreach ($brandNode->issuers[0]->issuer as $issuerNode) {
                        $issuers[(int) $issuerNode->attributes()['id']] = (string) $issuerNode->description;
                    }
                }
                $brand = new Brand();
                $brand
                    ->setId((int) $brandNode->attributes()['id'])
                    ->setName((string) $brandNode->name)
                    ->setIssuers($issuers)
                ;

                $this->brands[] = $brand;
            }
        }

        return $this->brands;
    }

    public function getByName(string $name): Brand
    {
        foreach ($this->getAll() as $brand) {
            if ($brand->getName() === $name) {
                return $brand;
            }
        }

        throw new PayvisionException('Brand "'.$name.'" not found.');
    }
}
