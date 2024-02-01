<?php

namespace Invoicetic\Common\Dto\InvoicedQuantity;

use Invoicetic\Common\Dto\Base\UnitCode;
use Invoicetic\Common\Serializer\Serializable;

class InvoicedQuantity
{
    use Serializable;

    protected string $unitCode = UnitCode::UNIT;
    protected float $quantity;

    public function __construct(float|int|null $quantity = null, ?string $unitCode = null)
    {
        $this->setQuantity($quantity);
        $this->unitCode = $unitCode ?? UnitCode::UNIT;
    }

    public static function from(float|int|null|array $data = null): self
    {
        if (is_array($data)) {
            return new self($data['quantity'] ?? null, $data['unitCode'] ?? null);
        }
        return new self($data);
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