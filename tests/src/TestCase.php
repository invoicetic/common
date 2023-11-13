<?php

namespace Invoicetic\Common\Tests;

use Mockery as m;

/**
 * Class AbstractTest
 */
abstract class TestCase extends \Bytic\Phpqa\PHPUnit\TestCase
{
    use m\Adapter\Phpunit\MockeryPHPUnitIntegration;

    protected static function mock($class)
    {
        return m::mock($class);
    }
}
