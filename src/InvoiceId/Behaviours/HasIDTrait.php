<?php

namespace Invoicetic\Common\InvoiceId\Behaviours;

trait HasIDTrait
{

    protected $id = null;

    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }
}

