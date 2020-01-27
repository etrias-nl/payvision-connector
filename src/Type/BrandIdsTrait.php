<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

trait BrandIdsTrait
{
    /** @var string[] */
    protected $brandIds = [];

    /**
     * @return string[]
     */
    public function getBrandIds(): array
    {
        return $this->brandIds;
    }

    public function setBrandIds(array $brandIds): self
    {
        $this->brandIds = $brandIds;

        return $this;
    }

    public function addBrandId(string $brandId): self
    {
        $this->brandIds[] = $brandId;

        return $this;
    }
}
