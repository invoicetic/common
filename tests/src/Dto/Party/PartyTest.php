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
            'legalEntity' => [
                'companyID' => '123456789',
                'registrationName' => 'John Doe',
            ],
            'postalAddress' => [
                'streetName' => 'Test street',
                'buildingNumber' => '1',
                'cityName' => 'Test city',
                'postalZone' => '123456',
                'country' => [
                    'identificationCode' => 'RO',
                ],
            ],
            'contact' => [
                'telephone' => '123456789',
                'electronicMail' => 'test@domain.com',
            ],
        ];
        $party = Party::denormalize($data);

        $identifier = $party->getPartyIdentification();
        $this->assertInstanceOf(Identifier::class, $identifier);
        $this->assertEquals('123456789', $identifier->getValue());

        $partySerialized = $party->serialize();
        $partySerialized = json_decode($partySerialized, true);
        $partyDenormalized = Party::denormalize($partySerialized);
        $this->assertEquals($party, $partyDenormalized);
    }
}
