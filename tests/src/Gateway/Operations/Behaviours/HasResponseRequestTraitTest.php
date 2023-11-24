<?php

namespace Invoicetic\Common\Tests\Gateway\Operations\Behaviours;

use Invoicetic\Common\Tests\Fixtures\Gateway\Operations\TestRequest;
use Invoicetic\Common\Tests\Fixtures\Gateway\Operations\TestResponse;
use Invoicetic\Common\Tests\TestCase;

class HasResponseRequestTraitTest extends TestCase
{
    public function test_createResponseClass()
    {
        $request = new TestRequest(
            $this->createMockClient(),
            $this->createMockRequest(),
        );
        $response = $request->send();
        self::assertInstanceOf(TestResponse::class, $response);
    }
}
