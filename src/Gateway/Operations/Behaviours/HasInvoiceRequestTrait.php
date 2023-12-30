<?php

namespace Invoicetic\Common\Gateway\Operations\Behaviours;

trait HasInvoiceRequestTrait
{
    /**
     * @return mixed
     */
    public function getInvoice()
    {
        return $this->getParameter('invoice');
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setInvoice($value)
    {
        return $this->setParameter('invoice', $value);
    }
}