<?php

namespace Invoicetic\Common\Dto\LegalEntity;

use Invoicetic\Common\Serializer\Serializable;

class LegalEntity
{

    use Serializable;
    
    protected $registrationName;
    protected $companyId;
    protected $companyIdAttributes;
    protected $companyLegalForm;

    /**
     * Seller name
     */
    public function getRegistrationName(): ?string
    {
        return $this->registrationName;
    }

    /**
     * Set seller name;
     */
    public function setRegistrationName(?string $registrationName): LegalEntity
    {
        $this->registrationName = $registrationName;
        return $this;
    }

    /**
     * Seller legal registration identifier
     */
    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    /**
     * set Company ID
     */
    public function setCompanyId(?string $companyId, $attributes = null): LegalEntity
    {
        $this->companyId = $companyId;
        if (isset($attributes)) {
            $this->companyIdAttributes = $attributes;
        }
        return $this;
    }

    /**
     * Company form legal
     */
    public function getCompanyLegalForm(): ?string
    {
        return $this->companyLegalForm;
    }

    /**
     * Set company form legal
     */
    public function setCompanyLegal(?string $companyLegalForm): LegalEntity
    {
        $this->companyLegalForm = $companyLegalForm;
        return $this;
    }

}