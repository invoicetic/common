<?php

namespace Invoicetic\Common\Tests\Dto\LegalEntity;

use Invoicetic\Common\Dto\LegalEntity\HasLegalEntityTrait;
use Invoicetic\Common\Dto\LegalEntity\LegalEntity;
use Invoicetic\Common\Dto\Party\Party;
use PHPUnit\Framework\TestCase;

class HasLegalEntityTraitTest extends TestCase
{

    public function test_denormalize()
    {
        $data = [
            'legalEntity' => [
                'RegistrationName' => 'Test name',
                'CompanyID' => '123456',
            ],
        ];
        $party = Party::denormalize($data);

        $item = $party->getLegalEntity();
        $this->assertInstanceOf(LegalEntity::class, $item);
        $this->assertEquals('Test name', $item->getRegistrationName());
        $this->assertEquals('123456', $item->getCompanyId());
    }
}
