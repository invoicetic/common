<?php

namespace Invoicetic\Common\Tests\InvoiceId\Dto;

use Invoicetic\Common\InvoiceId\Dto\InvoiceIdSequence;
use PHPUnit\Framework\TestCase;

class InvoiceIdSequenceTest extends TestCase
{

    public function test_denormalize()
    {
        $data = [
            'pattern' => 'INV-{NUMBER}',
            'sequence' => 'INV',
            'number' => 1,
            'numberLength' => 5,
        ];
        $sequence = InvoiceIdSequence::denormalize($data);

        $this->assertEquals('INV-{NUMBER}', $sequence->getPattern());
        $this->assertEquals('INV', $sequence->getSequence());
        $this->assertEquals(1, $sequence->getNumber());
        $this->assertEquals(5, $sequence->getNumberLength());
    }
}
