<?php

namespace Invoicetic\Common\Tests\Gateway;


use Invoicetic\Common\Gateway\GatewayFactory;
use Invoicetic\Common\Tests\TestCase;
use RuntimeException;

class GatewayFactoryTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        self::mock('alias:Invoicetic\\SpareChange\\TestGateway');
    }

    public function setUp(): void
    {
        $this->factory = new GatewayFactory;
    }

    public function testReplace()
    {
        $gateways = ['Foo'];
        $this->factory->replace($gateways);

        $this->assertSame($gateways, $this->factory->all());
    }

    public function testRegister()
    {
        $this->factory->register('Bar');

        $this->assertSame(['Bar'], $this->factory->all());
    }

    public function testRegisterExistingGateway()
    {
        $this->factory->register('Milky');
        $this->factory->register('Bar');
        $this->factory->register('Bar');

        $this->assertSame(array('Milky', 'Bar'), $this->factory->all());
    }

    public function testCreateShortName()
    {
        $gateway = $this->factory->create('SpareChange_Test');
        $this->assertInstanceOf('\\Invoicetic\\SpareChange\\TestGateway', $gateway);
    }

    public function testCreateFullyQualified()
    {
        $gateway = $this->factory->create('\\Invoicetic\\SpareChange\\TestGateway');
        $this->assertInstanceOf('\\Invoicetic\\SpareChange\\TestGateway', $gateway);
    }

    public function testCreateInvalid()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("Class '\Invoicetic\Invalid\Gateway' not found");

        $gateway = $this->factory->create('Invalid');
    }
}

