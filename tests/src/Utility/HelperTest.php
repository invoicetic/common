<?php

namespace Invoicetic\Common\Tests\Utility;

use Invoicetic\Common\Utility\Helper;
use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{
    public function test_getGatewayClassName()
    {
        $this->assertEquals('\Invoicetic\Fgoro\Gateway', Helper::getGatewayClassName('fgoro'));
    }
}
