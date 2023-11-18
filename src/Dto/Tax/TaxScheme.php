<?php

namespace Invoicetic\Common\Dto\Tax;

class TaxScheme
{
    protected $id;

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return TaxScheme
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
}