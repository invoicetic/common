<?php

namespace Invoicetic\Common\Dto\Contact;

use Invoicetic\Common\Dto\Base\Behaviours\HasName;
use Invoicetic\Common\Serializer\Serializable;

class Contact
{
    use Serializable;
    use HasName;

    protected $telephone = null;
    protected $email = null;

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }
}