<?php

namespace Invoicetic\Common\Dto\LegalEntity;

use Invoicetic\Common\Dto\Party\Party;

trait HasLegalEntityTrait
{

    /**
     * @var LegalEntity|null
     */
    private ?LegalEntity $legalEntity = null;

    /**
     * @return LegalEntity
     */
    public function getLegalEntity(): LegalEntity
    {
        if (null === $this->legalEntity) {
            $this->legalEntity = new LegalEntity();
        }
        return $this->legalEntity;
    }

    public function hasLegalEntity(): bool
    {
        return $this->legalEntity !== null;
    }

    /**
     * @param LegalEntity $legalEntity
     * @return self
     */
    public function setLegalEntity(LegalEntity $legalEntity): self
    {
        $this->legalEntity = $legalEntity;
        return $this;
    }

}