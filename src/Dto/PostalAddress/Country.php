<?php

namespace Invoicetic\Common\Dto\PostalAddress;

class Country
{
    protected $identificationCode;

    /**
     * Get Country Code
     */
    public function getIdentificationCode(): ?string {
        return $this->identificationCode;
    }

    /**
     * Set Country Code
     */
    public function setIdentificationCode(?string $identificationCode): Country {
        $this->identificationCode = $identificationCode;
        return $this;
    }
}