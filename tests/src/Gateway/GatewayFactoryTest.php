<?php

namespace Invoicetic\Common\Tests\Gateway;


use Invoicetic\Common\Gateway\GatewayFactory;
use Invoicetic\Common\Tests\TestCase;

class GatewayFactoryTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        self::mock('alias:Omnipay\\SpareChange\\TestGateway');
    }

    public function setUp(): void
    {
        $this->factory = new GatewayFactory;
    }

    public function testReplace()
    {
        $gateways = array('Foo');
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
        $this->assertInstanceOf('\\Omnipay\\SpareChange\\TestGateway', $gateway);
    }

    public function testCreateFullyQualified()
    {
        $gateway = $this->factory->create('\\Omnipay\\SpareChange\\TestGateway');
        $this->assertInstanceOf('\\Omnipay\\SpareChange\\TestGateway', $gateway);
    }

    public function testCreateInvalid()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("Class '\Omnipay\Invalid\Gateway' not found");

        $gateway = $this->factory->create('Invalid');
    }
}

