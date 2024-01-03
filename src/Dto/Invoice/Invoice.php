<?php

namespace Invoicetic\Common\Dto\Invoice;

use Invoicetic\Common\Dto\InvoiceLine\HasInvoiceLinesTrait;
use Invoicetic\Common\Dto\References\OrderReference\HasOrderReferenceTrait;
use Invoicetic\Common\InvoiceId\Behaviours\HasIdSequenceTrait;
use Invoicetic\Common\InvoiceId\Behaviours\HasIDTrait;
use Invoicetic\Common\Serializer\Serializable;

class Invoice
{
    use Behaviours\HasDatesTrait;
    use HasInvoiceLinesTrait;
    use HasIDTrait;
    use HasIdSequenceTrait;
    use HasOrderReferenceTrait;
    use Behaviours\HasPartiesTrait;
    use Behaviours\InvoiceValidationTrait;
    use Behaviours\HasCurrencyTrait;
    use Serializable;

    private $invoiceTypeCode = InvoiceTypeCode::INVOICE;

    /**
     * @return string
     */
    public function getInvoiceTypeCode(): ?string
    {
        return $this->invoiceTypeCode;
    }

    /**
     * @param string $invoiceTypeCode
     * See also: src/InvoiceTypeCode.php
     * @return Invoice
     */
    public function setInvoiceTypeCode(string $invoiceTypeCode): Invoice
    {
        $this->invoiceTypeCode = $invoiceTypeCode;
        return $this;
    }

}