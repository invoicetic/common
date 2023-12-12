<?php

namespace Invoicetic\Common\Tests\Dto\Price;

use Invoicetic\Common\Dto\Price\HasPriceTrait;
use PHPUnit\Framework\TestCase;

class HasPriceTraitTest extends TestCase
{
    public function test_auto_instantiation_of_price()
    {
        $mock = $this->getMockForTrait(HasPriceTrait::class);
        $this->assertNotNull($mock->getPrice());
    }
}
