<?php

namespace Invoicetic\Common\Dto\Identifier;

use Invoicetic\Common\Serializer\Serializable;

class Identifier
{
    use Serializable;

    protected string $value;
    protected ?string $scheme = null;


    /**
     * Class constructor
     * @param string $value Value
     * @param string|null $scheme Scheme ID
     */
    public function __construct(string $value, ?string $scheme = null)
    {
        $this->setValue($value);
        $this->setScheme($scheme);
    }

    public static function from($value): self
    {
        if ($value instanceof Identifier) {
            return $value;
        }
        if (is_string($value)) {
            return new self($value);
        }
        if (is_array($value)) {
            return new self($value['value'], $value['scheme'] ?? null);
        }
        throw new \InvalidArgumentException('Invalid identifier');
    }

    /**
     * Get value
     * @return string Value
     */
    public function getValue(): string
    {
        return $this->value;
    }


    /**
     * Set value
     * @param string $value Value
     * @return self          Identifier instance
     */
    public function setValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }


    /**
     * Get scheme ID
     * @return string|null Scheme ID
     */
    public function getScheme(): ?string
    {
        return $this->scheme;
    }


    /**
     * Set scheme ID
     * @param string|null $scheme Scheme ID
     * @return self                Identifier instance
     */
    public function setScheme(?string $scheme): self
    {
        $this->scheme = $scheme;
        return $this;
    }
}