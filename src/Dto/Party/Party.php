<?php

namespace Invoicetic\Common\Dto\Party;

use Invoicetic\Common\Dto\Base\Behaviours\HasName;
use Invoicetic\Common\Dto\Contact\HasContactTrait;
use Invoicetic\Common\Dto\Identifier\Identifier;
use Invoicetic\Common\Dto\LegalEntity\HasLegalEntityTrait;
use Invoicetic\Common\Dto\PostalAddress\HasPostalAddressTrait;
use Invoicetic\Common\Dto\PostalAddress\PostalAddress;
use Invoicetic\Common\Serializer\Serializable;

class Party
{
    use HasName;
    use HasLegalEntityTrait;
    use HasContactTrait;
    use HasPostalAddressTrait;
    use Behaviours\HasIdentifiersTrait;
    use Serializable;

    public const IDENTIFIER_PARTY_IDENTIFICATION = 'PartyIdentification';

}

