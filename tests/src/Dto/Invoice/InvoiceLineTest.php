<?php

namespace Invoicetic\Common\Tests\Dto\Invoice;

use Invoicetic\Common\Dto\Invoice\InvoiceLine;
use Invoicetic\Common\Tests\TestCase;

final class InvoiceLineTest extends TestCase {
    /** @var InvoiceLine */
    protected InvoiceLine $line;

    public function test_id() {
        $this->assertNull($this->line->getId());
        $this->line->setId(1);
        $this->assertEquals(1, $this->line->getId());
    }

    protected function setUp(): void {
        $this->line = new InvoiceLine();
    }
}