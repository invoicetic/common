<?php

namespace Invoicetic\Common\Dto\Party\Behaviours;

use Invoicetic\Common\Dto\Identifier\Identifier;
use Invoicetic\Common\Dto\Party\Party;

trait HasIdentifiersTrait
{
    use \Invoicetic\Common\Dto\Identifier\HasIdentifiersTrait;

    public function addPartyIdentification(Identifier $identifier): self
    {
        $identifier->setScheme(Party::IDENTIFIER_PARTY_IDENTIFICATION);
        $this->addIdentifier($identifier);
        return $this;
    }

    public function setPartyIdentification(Identifier|string|int $identifier): self
    {
        if ($identifier instanceof Identifier) {
            $this->addIdentifier($identifier);
            return $this;
        }
        if (is_string($identifier)) {
            $identifier = new Identifier($identifier);
        }
        $identifier->setScheme(Party::IDENTIFIER_PARTY_IDENTIFICATION);
        $this->addIdentifier($identifier);
        return $this;
    }

    public function removePartyIdentification(): self
    {
        $this->removeIdentifier(Party::IDENTIFIER_PARTY_IDENTIFICATION);
        return $this;
    }

    public function getPartyIdentification(): ?Identifier
    {
        return $this->getIdentifier(Party::IDENTIFIER_PARTY_IDENTIFICATION);
    }
}