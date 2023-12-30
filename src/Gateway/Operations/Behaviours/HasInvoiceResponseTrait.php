<?php

namespace Invoicetic\Common\Gateway\Operations\Behaviours;

trait HasInvoiceResponseTrait
{
    /**
     * @return mixed
     */
    public function getInvoice()
    {
        return $this->data['invoice'] ?? null;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setInvoice($value)
    {
        return $this->data['invoice'] = $value;
    }
}