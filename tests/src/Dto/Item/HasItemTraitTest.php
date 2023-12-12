<?php

namespace Invoicetic\Common\Tests\Dto\Item;

use Invoicetic\Common\Dto\Item\HasItemTrait;
use PHPUnit\Framework\TestCase;

class HasItemTraitTest extends TestCase
{
    public function test_auto_instantiation_of_item()
    {
        $mock = $this->getMockForTrait(HasItemTrait::class);
        $this->assertNotNull($mock->getItem());
    }
}
