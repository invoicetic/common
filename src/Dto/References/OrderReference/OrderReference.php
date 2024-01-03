<?php

namespace Invoicetic\Common\Dto\References\OrderReference;

use Invoicetic\Common\Dto\References\BaseReference;

class OrderReference extends BaseReference
{

    private $salesOrderId;

    /**
     * @return mixed
     */
    public function getSalesOrderId()
    {
        return $this->salesOrderId;
    }

    /**
     * @param mixed $salesOrderId
     */
    public function setSalesOrderId($salesOrderId): void
    {
        $this->salesOrderId = $salesOrderId;
    }


}

