<?php

namespace Invoicetic\Common\Tests\Utility;

use Invoicetic\Common\Dto\Invoice\Invoice;
use Invoicetic\Common\Utility\Serializer;
use PHPUnit\Framework\TestCase;

class SerializerTest extends TestCase
{
    public function test_serialize()
    {
        $now = \DateTime::createFromFormat('Y-m-d', '2019-01-01');
        $invoice = new Invoice();
        $invoice->setIssueDate($now);
        $invoice->setDueDate((clone $now)->add(new \DateInterval('P1D')));

        $serialized = Serializer::serialize($invoice, 'json');
        $this->assertJson($serialized);
        $this->assertStringContainsString('2019-01-01', $serialized);
        $this->assertStringContainsString('2019-01-02', $serialized);
    }

    public function test_deserialize()
    {
        $now = \DateTime::createFromFormat('Y-m-d', '2019-01-01');
        $invoice = new Invoice();
        $invoice->setIssueDate($now);
        $invoice->setDueDate((clone $now)->add(new \DateInterval('P1D')));

        $serialized = Serializer::serialize($invoice, 'json');

        $deserialized = Serializer::deserialize($serialized, Invoice::class, 'json');
        $this->assertEquals($invoice, $deserialized);
    }

    public function test_denormalize_with_array()
    {
        $data = [
            'issueDate' => '2019-01-01',
            'dueDate' => '2019-01-02',
        ];

        $invoice = Serializer::denormalize($data, Invoice::class, 'json');
        $this->assertInstanceOf(Invoice::class, $invoice);
        $this->assertEquals('2019-01-01', $invoice->getIssueDate()->format('Y-m-d'));
        $this->assertEquals('2019-01-02', $invoice->getDueDate()->format('Y-m-d'));
    }
}
