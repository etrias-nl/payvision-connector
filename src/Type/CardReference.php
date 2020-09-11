<?php

declare(strict_types=1);

namespace Etrias\PayvisionConnector\Type;

class CardReference
{
    use CardTrait;

    /** @var null|string */
    protected $firstSixDigits;

    /** @var null|string */
    protected $lastFourDigits;

    /** @var null|string */
    protected $approvalCode;

    public function getFirstSixDigits(): ?string
    {
        return $this->firstSixDigits;
    }

    public function setFirstSixDigits(?string $firstSixDigits): self
    {
        $this->firstSixDigits = $firstSixDigits;

        return $this;
    }

    public function getLastFourDigits(): ?string
    {
        return $this->lastFourDigits;
    }

    public function setLastFourDigits(?string $lastFourDigits): self
    {
        $this->lastFourDigits = $lastFourDigits;

        return $this;
    }

    public function getApprovalCode(): ?string
    {
        return $this->approvalCode;
    }

    public function setApprovalCode(?string $approvalCode): self
    {
        $this->approvalCode = $approvalCode;

        return $this;
    }
}
