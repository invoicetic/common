<?php

namespace Invoicetic\Common\Dto\Item;

trait HasItemTrait
{
    protected $item;

    /**
     * @return Item
     */
    public function getItem(): Item
    {
        return $this->item;
    }

    /**
     * @param Item $item
     * @return self
     */
    public function setItem(Item $item): self
    {
        $this->item = $item;
        return $this;
    }

}

