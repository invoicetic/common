<?php

namespace Invoicetic\Common\Dto\Identifier;

use OutOfBoundsException;

trait HasIdentifiersTrait
{
    protected array $identifiers = [];

    /**
     * Get additional identifiers
     * @return Identifier[] Array of identifiers
     */
    public function getIdentifiers(): array {
        return $this->identifiers;
    }


    /**
     * Add additional identifier
     * @param  Identifier $identifier Identifier instance
     * @return self                   This instance
     */
    public function addIdentifier(Identifier $identifier): self {
        $this->identifiers[] = $identifier;
        return $this;
    }


    /**
     * Remove additional identifier
     * @param  int  $index Identifier index
     * @return self        This instance
     * @throws OutOfBoundsException if identifier index is out of bounds
     */
    public function removeIdentifier(int $index): self {
        if ($index < 0 || $index >= count($this->identifiers)) {
            throw new OutOfBoundsException('Could not find identifier by index');
        }
        array_splice($this->identifiers, $index, 1);
        return $this;
    }


    /**
     * Clear all additional identifiers
     * @return self This instance
     */
    public function clearIdentifiers(): self {
        $this->identifiers = [];
        return $this;
    }
}