<?php

namespace Invoicetic\Common\Dto\Party;

use Invoicetic\Common\Dto\Base\Behaviours\HasName;
use Invoicetic\Common\Dto\LegalEntity\HasLegalEntityTrait;
use Invoicetic\Common\Dto\PostalAddress\PostalAddress;

class Party
{
    use HasName;
    use HasLegalEntityTrait;

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

