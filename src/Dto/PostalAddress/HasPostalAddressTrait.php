<?php

namespace Invoicetic\Common\Dto\PostalAddress;


trait HasPostalAddressTrait
{


    protected ?PostalAddress $postalAddress = null;

    public function getPostalAddress(): ?PostalAddress
    {
        return $this->postalAddress;
    }

    public function setPostalAddress(?PostalAddress $postalAddress): self
    {
        $this->postalAddress = $postalAddress;
        return $this;
    }

}