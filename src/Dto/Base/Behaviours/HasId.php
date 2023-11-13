<?php


namespace Invoicetic\Common\Dto\Base\Behaviours;

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
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }
}