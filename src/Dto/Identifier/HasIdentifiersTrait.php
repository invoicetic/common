<?php

namespace Invoicetic\Common\Dto\Identifier;

use ArrayObject;
use Invoicetic\Common\Dto\Party\Party;

trait HasIdentifiersTrait
{
    /**
     * @var array<string, Identifier> Array of additional identifiers
     */
    protected array $identifiers = [];

    /**
     * Get additional identifiers
     * @return Identifier[] Array of identifiers
     */
    public function getIdentifiers(): array
    {
        return $this->identifiers;
    }

    public function getIdentifier(string $scheme): ?Identifier
    {
        foreach ($this->identifiers as $identifier) {
            if ($identifier->getScheme() === $scheme) {
                return $identifier;
            }
        }
        return null;
    }

    /**
     * Add additional identifier
     * @param Identifier $identifier Identifier instance
     * @return self This instance
     */
    public function addIdentifier(Identifier $identifier): self
    {
        $key = null;
        foreach ($this->identifiers as $k => $id) {
            if ($id->getScheme() === $identifier->getScheme()) {
                $key = $k;
                break;
            }
        }
        if ($key !== null) {
            $this->identifiers[$key] = $identifier;
        } else {
            $this->identifiers[] = $identifier;
        }
        $this->reindexIdentifiers();
        return $this;
    }

    public function setIdentifiers($identifiers): self
    {
        foreach ($identifiers as $identifier) {
            $this->addIdentifier(
                Identifier::from($identifier)
            );
        }
        return $this;
    }

    /**
     * Remove additional identifier
     * @param int|string|Identifier $identifier
     * @return Party|HasIdentifiersTrait This instance
     */
    public function removeIdentifier(int|string|Identifier $identifier): self
    {
        $scheme = $identifier instanceof Identifier ? $identifier->getScheme() : $identifier;
        unset($this->identifiers[$scheme]);
        return $this;
    }


    /**
     * Clear all additional identifiers
     * @return self This instance
     */
    public function clearIdentifiers(): self
    {
        $this->identifiers = [];
        return $this;
    }

    protected function reindexIdentifiers()
    {
        $this->identifiers = array_values($this->identifiers);
    }
}