<?php

namespace Invoicetic\Common\Dto\Item;

trait HasItemTrait
{
    protected ?Item $item = null;

    /**
     * @return Item
     */
    public function getItem(): Item
    {
        if ($this->item === null) {
            $this->initItem();
        }
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

    protected function initItem(): void
    {
        $this->item = new Item();
    }
}

