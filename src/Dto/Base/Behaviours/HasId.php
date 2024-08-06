<?php


namespace Invoicetic\Common\Dto\Base\Behaviours;

use Invoicetic\Common\Dto\InvoiceLine\InvoiceLine;
use Invoicetic\Common\Dto\References\BaseReference;

trait HasId
{
    protected ?string $id = null;

    /**
     * Get identifier
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }


    /**
     * Set identifier
     * @param string|null $id
     * @return BaseReference|HasId|InvoiceLine
     */
    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }
}