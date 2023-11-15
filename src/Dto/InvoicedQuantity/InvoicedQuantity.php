<?php

namespace Invoicetic\Common\Dto\InvoicedQuantity;

use Invoicetic\Common\Dto\Base\UnitCode;

class InvoicedQuantity
{
    protected string $unitCode;
    protected float $quantity;

    public function __construct(float|int|null $quantity = null, ?string $unitCode = null)
    {
        $this->setQuantity($quantity);
        $this->unitCode = $unitCode ?? UnitCode::UNIT;
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

    public function setQuantity(float|int|null $quantity): void
    {
        $quantity = (float) $quantity;
        $this->quantity = $quantity;
    }
}