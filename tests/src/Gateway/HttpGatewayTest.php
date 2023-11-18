<?php

namespace Invoicetic\Common\Tests\Gateway;

use Invoicetic\Common\Gateway\HttpGateway;
use Invoicetic\Common\Tests\Fixtures\Gateway\TestHttpGateway;
use PHPUnit\Framework\TestCase;

class HttpGatewayTest extends TestCase
{

    public function test_getEndponit_from_constants()
    {
        $gateway = new TestHttpGateway();
        $this->assertEquals(expected: TestHttpGateway::ENDPOINT_PRODUCTION, actual: $gateway->getEndpoint());

        $gateway = new TestHttpGateway();
        $gateway->setSandbox(true);
        self::assertTrue($gateway->isSandbox());
        $this->assertEquals(expected: TestHttpGateway::ENDPOINT_SANDBOX, actual: $gateway->getEndpoint());
    }
}
