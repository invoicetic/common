<?php

namespace Invoicetic\Common\Dto\Invoice;

use DateTime;
use Invoicetic\Common\Dto\Party\Party;

class Invoice
{
    use Behaviours\InvoiceValidationTrait;

    /**
     * @var \DateTime
     */
    private $issueDate;

    private $invoiceTypeCode = InvoiceTypeCode::INVOICE;

    private $dueDate;


    private $accountingSupplierParty;
    private $accountingCustomerParty;

    /**
     * @return \DateTime
     */
    public function getIssueDate() {
        return $this->issueDate;
    }

    /**
     * @param \DateTime $issueDate
     * @return Invoice
     */
    public function setIssueDate($issueDate) {
        $this->issueDate = $issueDate;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDueDate(): ?DateTime
    {
        return $this->dueDate;
    }

    /**
     * @param DateTime $dueDate
     * @return Invoice
     */
    public function setDueDate(DateTime $dueDate): Invoice
    {
        $this->dueDate = $dueDate;
        return $this;
    }


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