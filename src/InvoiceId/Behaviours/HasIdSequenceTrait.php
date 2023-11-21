<?php

namespace Invoicetic\Common\InvoiceId\Behaviours;

use Invoicetic\Common\InvoiceId\Dto\InvoiceIdSequence;

trait HasIdSequenceTrait
{
    protected InvoiceIdSequence|null $idSequence = null;

    public function setIdSequence(?InvoiceIdSequence $idSequence): self
    {
        $this->idSequence = $idSequence;
        return $this;
    }

    public function getIdSequence(): ?InvoiceIdSequence
    {
        return $this->idSequence;
    }
}
