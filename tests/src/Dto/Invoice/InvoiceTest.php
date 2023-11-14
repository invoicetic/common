<?php

namespace Invoicetic\Common\Tests\Dto\Invoice;

use Invoicetic\Common\Dto\Invoice\Invoice;
use Invoicetic\Common\Dto\Item\Item;
use PHPUnit\Framework\TestCase;

class InvoiceTest extends TestCase
{

    public function test_denormalize()
    {
        $data = [
            'invoiceLines' => [
                [
                    'price' => [
                        'priceAmount' => 100,
                        'baseQuantity' => 5,
                    ],
                    'item' => [
                        'name' => 'Test name',
                        'description' => 'Test description',
                    ],
                    'invoicedQuantity' => 1,
                ],
            ],
        ];
        $invoice = Invoice::denormalize($data);

        $lines = $invoice->getInvoiceLines();
        self::assertCount(1, $lines);
        $line = $lines[0];
        $item = $line->getItem();
        $this->assertInstanceOf(Item::class, $item);
        $this->assertEquals('Test name', $item->getName());
        $this->assertEquals('Test description', $item->getDescription());
    }

}
