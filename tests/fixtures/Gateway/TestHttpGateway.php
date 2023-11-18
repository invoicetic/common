<?php

namespace Invoicetic\Common\Tests\Fixtures\Gateway;

use Invoicetic\Common\Gateway\HttpGateway;

class TestHttpGateway extends HttpGateway
{

    public const ENDPOINT_PRODUCTION = 'https://api.test.com/';
    public const ENDPOINT_SANDBOX = 'http://sandbox.test.com/';

    public function getName()
    {
        return 'TestHttpGateway';
    }
}

