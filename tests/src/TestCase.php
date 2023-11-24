<?php

namespace Invoicetic\Common\Tests;

use Mockery as m;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AbstractTest
 */
abstract class TestCase extends \Bytic\Phpqa\PHPUnit\TestCase
{
    protected static function mock($class)
    {
        return m::mock($class);
    }

    protected function createMockClient()
    {
        $client = $this->getMockBuilder('GuzzleHttp\Client')->getMock();
        return $client;
    }

    protected function createMockRequest()
    {
        $request = Request::createFromGlobals();
        return $request;
    }
}
