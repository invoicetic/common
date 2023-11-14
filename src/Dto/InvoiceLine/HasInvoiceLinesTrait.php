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
        $invoiceLines = array_map(function ($invoiceLine) {
            return $invoiceLine instanceof InvoiceLine ? $invoiceLine : InvoiceLine::denormalize($invoiceLine);
        }, $invoiceLines);
        $this->invoiceLines = $invoiceLines;
        return $this;
    }

    public function addInvoiceLine(InvoiceLine $invoiceLine): Invoice
    {
        $this->invoiceLines[] = $invoiceLine;
        return $this;
    }

    public function removeInvoiceLine(InvoiceLine $invoiceLine): Invoice
    {
        $this->invoiceLines = array_filter($this->invoiceLines, function ($item) use ($invoiceLine) {
            return $item !== $invoiceLine;
        });
        return $this;
    }

    public function hasInvoiceLine(InvoiceLine $invoiceLine): bool
    {
        return in_array($invoiceLine, $this->invoiceLines);
    }

    public function getInvoiceLineById(string $id): ?InvoiceLine
    {
        foreach ($this->invoiceLines as $invoiceLine) {
            if ($invoiceLine->getId() === $id) {
                return $invoiceLine;
            }
        }
        return null;
    }

    public function getInvoiceLineByIndex(int $index): ?InvoiceLine
    {
        return $this->invoiceLines[$index] ?? null;
    }


}