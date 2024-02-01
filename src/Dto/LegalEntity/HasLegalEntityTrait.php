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
    public function getLegalEntity(): ?LegalEntity
    {
        return $this->legalEntity;
    }

    public function hasLegalEntity(): bool
    {
        return $this->legalEntity !== null;
    }

    /**
     * @param LegalEntity|null $legalEntity
     * @return Party|HasLegalEntityTrait
     */
    public function setLegalEntity(?LegalEntity $legalEntity): self
    {
        $this->legalEntity = $legalEntity;
        return $this;
    }

}