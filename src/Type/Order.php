<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class Order
{
    /** @var OrderLine[] */
    protected $orderLines = [];

    /**
     * @return OrderLine[]
     */
    public function getOrderLines(): array
    {
        return $this->orderLines;
    }

    /**
     * @param OrderLine[] $orderLines
     */
    public function setOrderLines(array $orderLines): self
    {
        $this->orderLines = $orderLines;

        return $this;
    }

    public function addOrderLine(OrderLine $orderLine): self
    {
        $this->orderLines[] = $orderLine;

        return $this;
    }
}
