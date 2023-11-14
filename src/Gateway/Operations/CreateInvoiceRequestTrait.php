<?php

namespace Invoicetic\Common\Gateway\Operations;

use Invoicetic\Common\Dto\Invoice\Invoice;

trait CreateInvoiceRequestTrait
{
    protected Invoice $invoice;

    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(Invoice $invoice): void
    {
        $this->invoice = $invoice;
    }
}