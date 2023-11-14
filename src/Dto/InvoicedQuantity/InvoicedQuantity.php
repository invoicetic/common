<?php

namespace Invoicetic\Common\Dto\InvoicedQuantity;

use Invoicetic\Common\Dto\Base\UnitCode;

class InvoicedQuantity
{
    protected string $unitCode;
    protected float $quantity;

    public function __construct(float|int $quantity = null, ?string $unitCode = null)
    {
        $this->unitCode = $unitCode = $unitCode ?? UnitCode::UNIT;
        $this->quantity = floatval($quantity);
    }

    public function getUnitCode(): string
    {
        return $this->unitCode;
    }

    public function setUnitCode(string $unitCode): void
    {
        $this->unitCode = $unitCode;
    }

    public function getQuantity(): string
    {
        return $this->quantity;
    }

    public function setQuantity(string $quantity): void
    {
        $this->quantity = $quantity;
    }
}