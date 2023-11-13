<?php

namespace Invoicetic\Common\Dto\LegalEntity;

use Invoicetic\Common\Dto\Party\Party;

trait HasLegalEntityTrait
{

    /**
     * @var LegalEntity
     */
    private $legalEntity;

    /**
     * @return LegalEntity
     */
    public function getLegalEntity() {
        return $this->legalEntity;
    }

    /**
     * @param $legalEntity
     * @return Party
     */
    public function setLegalEntity($legalEntity) {
        $this->legalEntity = $legalEntity;
        return $this;
    }
}