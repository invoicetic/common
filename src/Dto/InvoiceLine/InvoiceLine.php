<?php

namespace Invoicetic\Common\Dto\InvoiceLine;

use Invoicetic\Common\Dto\Base\Behaviours\HasAttributesTrait;
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
    use HasAttributesTrait;
    use Serializable;

    protected $lineExtensionAmount;

    /**
     * @return mixed
     */
    public function getLineExtensionAmount()
    {
        return $this->lineExtensionAmount;
    }

    /**
     * @param mixed $lineExtensionAmount
     * @return InvoiceLine
     */
    public function setLineExtensionAmount($lineExtensionAmount)
    {
        $this->lineExtensionAmount = $lineExtensionAmount;
        return $this;
    }

    public function setTotalAmount(float $value): self
    {
        $this->attributes['total_amount'] = $value;
        return $this;
    }

    public function getTotalAmount()
    {
        return $this->getAttribute('total_amount');
    }

    public function hasTotalAmount(): bool
    {
        return $this->hasAttribute('total_amount');
    }
}