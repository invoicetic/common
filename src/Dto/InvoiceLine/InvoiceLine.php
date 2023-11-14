<?php

namespace Invoicetic\Common\Dto\InvoiceLine;

use Invoicetic\Common\Dto\Base\Behaviours\HasId;
use Invoicetic\Common\Dto\InvoicedQuantity\HasInvoicedQuantity;
use Invoicetic\Common\Dto\Item\HasItemTrait;
use Invoicetic\Common\Dto\Price\HasPriceTrait;
use Invoicetic\Common\Serializer\Serializable;

class InvoiceLine
{
    use HasId;
    use HasItemTrait;
    use HasPriceTrait;
    use HasInvoicedQuantity;
    use Behaviours\HasNoteTrait;
    use Serializable;

    protected $lineExtensionAmount;

    /**
     * @return mixed
     */
    public function getLineExtensionAmount() {
        return $this->lineExtensionAmount;
    }

    /**
     * @param mixed $lineExtensionAmount
     * @return InvoiceLine
     */
    public function setLineExtensionAmount($lineExtensionAmount) {
        $this->lineExtensionAmount = $lineExtensionAmount;
        return $this;
    }
}