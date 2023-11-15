<?php

namespace Invoicetic\Common\Tests\Dto\InvoiceLine;

use Invoicetic\Common\Dto\InvoiceLine\InvoiceLine;
use Invoicetic\Common\Dto\Item\Item;
use PHPUnit\Framework\TestCase;

class InvoiceLineTest extends TestCase
{
    /** @var InvoiceLine */
    protected InvoiceLine $line;

    public function test_id()
    {
        $this->assertNull($this->line->getId());
        $this->line->setId(1);
        $this->assertEquals(1, $this->line->getId());
    }

    public function test_denormalize()
    {
        $data = [
            'price' => [
                'priceAmount' => 100,
                'baseQuantity' => 5,
            ],
            'item' => [
                'name' => 'Test name',
                'description' => 'Test description',
            ],
            'invoicedQuantity' => ['quantity' => 1.0],
        ];
        $line = InvoiceLine::denormalize($data);

        $item = $line->getItem();
        $this->assertInstanceOf(Item::class, $item);
        $this->assertEquals('Test name', $item->getName());
        $this->assertEquals('Test description', $item->getDescription());
        $this->assertEquals(1, $line->getInvoicedQuantity()->getQuantity());
    }

    protected function setUp(): void
    {
        $this->line = new InvoiceLine();
    }

}
