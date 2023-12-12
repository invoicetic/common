<?php

namespace Invoicetic\Common\Dto\Price;

trait HasPriceTrait
{

    protected ?Price $price = null;

    /**
     * @return Price|null
     */
    public function getPrice(): ?Price
    {
        if ($this->price === null) {
            $this->initPrice();
        }
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

    protected function initPrice(): void
    {
        $this->price = new Price();
    }
}