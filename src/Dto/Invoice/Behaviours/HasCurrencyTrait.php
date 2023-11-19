<?php

namespace Invoicetic\Common\Dto\Invoice\Behaviours;

trait HasCurrencyTrait
{

    protected string $documentCurrencyCode = 'EUR';

    /**
     * @param mixed $currencyCode
     * @return self
     */
    public function setDocumentCurrencyCode(string $currencyCode = 'EUR'): self
    {
        $this->documentCurrencyCode = $currencyCode;
        return $this;
    }

    public function getDocumentCurrencyCode(): string
    {
        return $this->documentCurrencyCode;
    }

    public function setCurrency(string $currencyCode = 'EUR'): self
    {
        return $this->setDocumentCurrencyCode($currencyCode);
    }
}