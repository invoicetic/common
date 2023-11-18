<?php

namespace Invoicetic\Common\Dto\Party;

use Invoicetic\Common\Dto\Base\Behaviours\HasName;
use Invoicetic\Common\Dto\Identifier\Identifier;
use Invoicetic\Common\Dto\LegalEntity\HasLegalEntityTrait;
use Invoicetic\Common\Dto\PostalAddress\PostalAddress;
use Invoicetic\Common\Serializer\Serializable;

class Party
{
    use HasName;
    use HasLegalEntityTrait;
    use Behaviours\HasIdentifiersTrait;
    use Serializable;

    public const IDENTIFIER_PARTY_IDENTIFICATION = 'PartyIdentification';

    protected ?PostalAddress $postalAddress = null;

    public function getPostalAddress(): ?PostalAddress
    {
        return $this->postalAddress;
    }

    public function setPostalAddress(PostalAddress $postalAddress): self
    {
        $this->postalAddress = $postalAddress;
        return $this;
    }
}

