<?php

namespace Invoicetic\Common\InvoiceId\Generator;

interface InvoiceNumberGenerator
{
    public function generate(): string;
}