<?php

namespace Invoicetic\Common\Tests\Dto\InvoiceLine;

use Invoicetic\Common\Dto\InvoiceLine\InvoiceLine;
use Invoicetic\Common\Dto\Item\Item;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertSame;

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

    public function test_normalize_with_total()
    {
        self::assertFalse($this->line->hasTotalAmount());
        $this->line->setTotalAmount(123.45);
        $this->line->setNote('Test note');
        self::assertSame(123.45, $this->line->getTotalAmount());
        self::assertTrue($this->line->hasTotalAmount());

        $lineNormalized = $this->line->serialize();
        $lineNormalized = json_decode($lineNormalized, true);

        $line = InvoiceLine::denormalize($lineNormalized);

        self::assertTrue($line->hasTotalAmount());
        self::assertSame(123.45, $line->getTotalAmount());
    }

    protected function setUp(): void
    {
        $this->line = new InvoiceLine();
    }

}
