<?php

namespace Invoicetic\Common\Gateway\Operations;

use Invoicetic\Common\Dto\Invoice\Invoice;

trait CreateInvoiceRequestTrait
{

    public function getInvoice(): Invoice
    {
        return $this->getParameter('invoice');
    }

    public function setInvoice(Invoice $invoice): void
    {
        $this->setParameter('invoice', $invoice);
    }
}