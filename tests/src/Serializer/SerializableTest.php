<?php

namespace Invoicetic\Common\Tests\Serializer;

use Invoicetic\Common\Dto\Invoice\Invoice;
use PHPUnit\Framework\TestCase;

class SerializableTest extends TestCase
{
    public function test_denormalize()
    {
        $data = [
            'issueDate' => '2019-01-01',
            'dueDate' => '2019-01-02',
        ];

        $invoice = Invoice::denormalize($data);
        $this->assertInstanceOf(Invoice::class, $invoice);
        $this->assertEquals('2019-01-01', $invoice->getIssueDate()->format('Y-m-d'));
        $this->assertEquals('2019-01-02', $invoice->getDueDate()->format('Y-m-d'));
    }
}
