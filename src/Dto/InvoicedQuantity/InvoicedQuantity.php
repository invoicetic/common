<?php

namespace Invoicetic\Common\Dto\InvoicedQuantity;

class InvoicedQuantity
{
    protected string $unitCode;
    protected float $quantity;

    public function __construct(float $quantity = null, string $unitCode = null)
    {
        $this->unitCode = $unitCode;
        $this->quantity = $quantity;
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