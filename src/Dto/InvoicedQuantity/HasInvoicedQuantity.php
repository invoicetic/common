<?php

namespace Invoicetic\Common\Dto\InvoicedQuantity;

use Invoicetic\Common\Dto\InvoiceLine\InvoiceLine;

trait HasInvoicedQuantity
{
    /**
     * @var InvoicedQuantity
     */
    protected InvoicedQuantity $invoicedQuantity;

    /**
     * @return InvoicedQuantity
     */
    public function getInvoicedQuantity(): InvoicedQuantity
    {
        if ($this->invoicedQuantity === null) {
            $this->invoicedQuantity = new InvoicedQuantity();
        }
        return $this->invoicedQuantity;
    }

    /**
     * @param float|InvoicedQuantity|null $invoicedQuantity
     * @return HasInvoicedQuantity|InvoiceLine
     */
    public function setInvoicedQuantity(float|InvoicedQuantity|null $invoicedQuantity): self
    {
        $invoicedQuantity = $invoicedQuantity instanceof InvoicedQuantity
            ? $invoicedQuantity
            : new InvoicedQuantity($invoicedQuantity);
        $this->invoicedQuantity = $invoicedQuantity;
        return $this;
    }


    /**
     * @return string
     */
    public function getUnitCode(): ?string
    {
        return $this->getInvoicedQuantity()->getUnitCode();
    }

    /**
     * @param string $unitCode
     * @return self
     */
    public function setUnitCode(?string $unitCode): self
    {
        $this->getInvoicedQuantity()->setUnitCode($unitCode);
        return $this;
    }
}