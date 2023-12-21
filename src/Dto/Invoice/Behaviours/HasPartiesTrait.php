<?php

namespace Invoicetic\Common\Dto\Invoice\Behaviours;

use Invoicetic\Common\Dto\Party\Party;

trait HasPartiesTrait
{

    private ?Party $accountingSupplierParty = null;

    private ?Party $accountingCustomerParty = null;

    public function getAccountingSupplierParty(): ?Party
    {
        return $this->accountingSupplierParty;
    }

    public function setAccountingSupplierParty(?Party $accountingSupplierParty): self
    {
        $this->accountingSupplierParty = $accountingSupplierParty;
        return $this;
    }

    public function getAccountingCustomerParty(): ?Party
    {
        return $this->accountingCustomerParty;
    }

    public function setAccountingCustomerParty(?Party $accountingCustomerParty): self
    {
        $this->accountingCustomerParty = $accountingCustomerParty;
        return $this;
    }

}