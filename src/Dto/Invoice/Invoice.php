<?php

namespace Invoicetic\Common\Dto\Invoice;

use DateTime;
use Invoicetic\Common\Dto\Party\Party;
use Invoicetic\Common\Serializer\Serializable;

class Invoice
{
    use Behaviours\HasDates;
    use Behaviours\InvoiceValidationTrait;
    use Serializable;

    private $invoiceTypeCode = InvoiceTypeCode::INVOICE;

    private ?Party $accountingSupplierParty;
    private ?Party $accountingCustomerParty;




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

    /**
     * @return Party
     */
    public function getAccountingSupplierParty(): ?Party
    {
        return $this->accountingSupplierParty;
    }

    /**
     * @param Party $accountingSupplierParty
     * @return Invoice
     */
    public function setAccountingSupplierParty(Party $accountingSupplierParty): Invoice
    {
        $this->accountingSupplierParty = $accountingSupplierParty;
        return $this;
    }

    /**
     * @return Party
     */
    public function getAccountingCustomerParty(): ?Party
    {
        return $this->accountingCustomerParty;
    }

    /**
     * @param Party $accountingCustomerParty
     * @return Invoice
     */
    public function setAccountingCustomerParty(Party $accountingCustomerParty): Invoice
    {
        $this->accountingCustomerParty = $accountingCustomerParty;
        return $this;
    }

}