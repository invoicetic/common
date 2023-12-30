<?php

namespace Invoicetic\Common\Gateway\Operations;

use Invoicetic\Common\Gateway\Operations\Behaviours\HasInvoiceResponseTrait;

trait CreateInvoiceResponseTrait
{
    use HasInvoiceResponseTrait;

    public function __construct(AbstractRequest $request, $data)
    {
        parent::__construct($request, $data);

        if (isset($data['invoice'])) {
            $this->parseInvoiceFromData($data);
        }
    }

    protected function parseInvoiceFromData($data)
    {
    }
}
