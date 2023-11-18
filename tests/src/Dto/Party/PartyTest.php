<?php

namespace Invoicetic\Common\Tests\Dto\Party;

use Invoicetic\Common\Dto\Identifier\Identifier;
use Invoicetic\Common\Dto\LegalEntity\LegalEntity;
use Invoicetic\Common\Dto\Party\Party;
use PHPUnit\Framework\TestCase;

class PartyTest extends TestCase
{
    public function test_denormalize()
    {
        $data = [
            'name' => 'John Doe',
            'partyIdentification' => '123456789',
        ];
        $party = Party::denormalize($data);

        $identifier = $party->getPartyIdentification();
        $this->assertInstanceOf(Identifier::class, $identifier);
        $this->assertEquals('123456789', $identifier->getValue());
    }
}
