<?php

namespace Invoicetic\Common\Tests;

use Mockery as m;

/**
 * Class AbstractTest
 */
abstract class TestCase extends \Bytic\Phpqa\PHPUnit\TestCase
{
    protected static function mock($class)
    {
        return m::mock($class);
    }
}
