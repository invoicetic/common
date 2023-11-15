<?php

namespace Invoicetic\Common\Tests\Dto\InvoicedQuantity;

use Invoicetic\Common\Dto\InvoicedQuantity\InvoicedQuantity;
use PHPUnit\Framework\TestCase;

class InvoicedQuantityTest extends TestCase
{
    public function test_create_with_int()
    {
        $invoicedQuantity = new InvoicedQuantity(1);
        $this->assertEquals(1, $invoicedQuantity->getQuantity());
    }
}
