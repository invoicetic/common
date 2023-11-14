<?php

namespace Invoicetic\Common\Dto\Price;

use Invoicetic\Common\Dto\Base\UnitCode;

class Price
{
    /**
     * The price of an item, exclusive of VAT, after subtracting item price discount. The Item net price has to be equal with the Item gross price less the Item price discount, if they are both provided. Item price can not be negative.
     */
    protected $priceAmount;
    protected $baseQuantity;
    protected $unitCode = UnitCode::UNIT;

    /**
     * The price of an item, exclusive of VAT, after subtracting item price discount.
     *  Example value: 23.45
     */
    public function getPriceAmount(): ?float
    {
        return $this->priceAmount;
    }

    /**
     * Set price amount
     */
    public function setPriceAmount(?float $priceAmount): Price
    {
        $this->priceAmount = $priceAmount;
        return $this;
    }

    /**
     * The number of item units to which the price applies.
     * Example value: 1
     */
    public function getBaseQuantity(): ?float
    {
        return $this->baseQuantity;
    }

    /**
     * Set base quantity
     */
    public function setBaseQuantity(?float $baseQuantity): Price
    {
        $this->baseQuantity = $baseQuantity;
        return $this;
    }

    /**
     * get unit code
     */
    public function getUnitCode(): ?string
    {
        return $this->unitCode;
    }

    /**
     * set unit code
     */
    public function setUnitCode(?string $unitCode): Price
    {
        $this->unitCode = $unitCode;
        return $this;
    }
}