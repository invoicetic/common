<?php

namespace Invoicetic\Common\Dto\References\OrderReference;


trait HasOrderReferenceTrait
{
    protected ?OrderReference $orderReference = null;

    /**
     * @return OrderReference|null
     */
    public function getOrderReference(): ?OrderReference
    {
        return $this->orderReference;
    }

    /**
     * @param OrderReference|null $orderReference
     * @return self
     */
    public function setOrderReference(?OrderReference $orderReference): self
    {
        $this->orderReference = $orderReference;
        return $this;
    }
}