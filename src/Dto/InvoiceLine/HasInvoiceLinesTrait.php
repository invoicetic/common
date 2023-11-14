<?php

namespace Invoicetic\Common\Dto\InvoiceLine;

use Invoicetic\Common\Dto\Invoice\Invoice;

trait HasInvoiceLinesTrait
{
    protected $invoiceLines = [];

    /**
     * @return InvoiceLine[]
     */
    public function getInvoiceLines(): array
    {
        return $this->invoiceLines;
    }

    /**
     * @param InvoiceLine[] $invoiceLines
     * @return Invoice
     */
    public function setInvoiceLines(array $invoiceLines): Invoice
    {
        $this->invoiceLines = $invoiceLines;
        return $this;
    }

}