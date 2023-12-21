<?php

namespace Invoicetic\Common\Tests\Dto\Invoice;

use Invoicetic\Common\Dto\Invoice\Invoice;
use Invoicetic\Common\Dto\Item\Item;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertSame;

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
                    'invoicedQuantity' => ['quantity' => 1],
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
        $this->assertEquals(1, $line->getInvoicedQuantity()->getQuantity());
    }

    public function test_denormalize_normalize()
    {
        $dataJson = file_get_contents(TEST_FIXTURE_PATH . '/Invoices/Serialized/base_invoice.json');
        $data = json_decode($dataJson, true);

        $invoice = Invoice::denormalize($data);
        self::assertEquals('SPT-00135', $invoice->getId());
        self::assertEquals('SPT', $invoice->getIdSequence()->getSequence());

        $customer = $invoice->getAccountingCustomerParty();
        self::assertEquals('SC BUCU', $customer?->getName());
    }

}
