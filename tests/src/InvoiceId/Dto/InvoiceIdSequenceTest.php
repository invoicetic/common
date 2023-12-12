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

    /**
     * @param string $result
     * @param string $pattern
     * @param array $data
     * @return void
     * @dataProvider data_getId
     */
    public function test_getId(string $result, string $pattern, array $data)
    {
        $sequence = new InvoiceIdSequence();
        $sequence->setPattern($pattern);
        $sequence->fill($data);

        $this->assertEquals($result, $sequence->getId());
    }

    public function data_getId(): array
    {
        return [
            ['INV-00001', 'INV-{NUMBER}', ['number' => 1]],
            ['INV-00002', '{SEQUENCE}-{NUMBER}', ['sequence' => 'INV', 'number' => 2]],
            ['INV-123456', '{SEQUENCE}-{NUMBER}', ['sequence' => 'INV', 'number' => '123456']]
        ];
    }
}
