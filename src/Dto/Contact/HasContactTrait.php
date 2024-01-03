<?php

namespace Invoicetic\Common\Dto\Contact;


trait HasContactTrait
{

    /**
     * @var Contact|null
     */
    private ?Contact $contact = null;

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        if (null === $this->contact) {
            $this->contact = new Contact();
        }
        return $this->contact;
    }

    public function hasContact(): bool
    {
        return $this->contact !== null;
    }

    /**
     * @param Contact $contact
     * @return self
     */
    public function setContact(Contact $contact): self
    {
        $this->contact = $contact;
        return $this;
    }

}