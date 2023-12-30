<?php

namespace Invoicetic\Common\Gateway\Operations;

use Invoicetic\Common\Gateway\Operations\Behaviours\HasInvoiceRequestTrait;

trait CreateInvoiceRequestTrait
{
    use HasInvoiceRequestTrait;

    protected function createResponseData($data)
    {
        $data = parent::createResponseData($data);
        $data['invoice'] = $this->createResponseInvoice($data);
        return $data;
    }

    protected function createResponseInvoice($data)
    {
        return $this->getInvoice();
    }
}