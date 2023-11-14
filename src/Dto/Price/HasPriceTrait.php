<?php

namespace Invoicetic\Common\Dto\Price;

trait HasPriceTrait
{

    protected Price $price;

    /**
     * @return Price|null
     */
    public function getPrice(): ?Price
    {
        return $this->price;
    }

    /**
     * @param Price $price
     * @return self
     */
    public function setPrice(?Price $price): self
    {
        $this->price = $price;
        return $this;
    }
}