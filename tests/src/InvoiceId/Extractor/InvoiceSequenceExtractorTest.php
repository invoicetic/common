<?php

namespace Invoicetic\Common\Tests\InvoiceId\Extractor;

use Invoicetic\Common\InvoiceId\Extractor\InvoiceSequenceExtractor;
use PHPUnit\Framework\TestCase;

class InvoiceSequenceExtractorTest extends TestCase
{
    /**
     * @param $number
     * @param $expected
     * @return void
     * @dataProvider data_extract
     */
    public function test_extract($number, $expected)
    {
        $extractor = new InvoiceSequenceExtractor($number);
        $invoiceNumber = $extractor->extract();
        $this->assertSame($expected, $invoiceNumber);
    }

    public function data_extract()
    {
        return [
            ['INV-0001', ['prefix' => 'INV-', 'number' => '0001', 'suffix' => null]],
            ['YEA-2023-00002', ['prefix' => 'YEA-2023-', 'number' => '00002', 'suffix' => null]],
            ['INV', ['prefix' => 'INV', 'number' => '', 'suffix' => null]],
            ['INV23-', ['prefix' => 'INV23-', 'number' => '', 'suffix' => null]],
        ];
    }


}
