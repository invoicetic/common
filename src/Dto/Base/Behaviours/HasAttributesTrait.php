<?php

declare(strict_types=1);


namespace Invoicetic\Common\Dto\Base\Behaviours;

use Invoicetic\Common\Utility\Helper;

/**
 * Trait HasAttributesTrait.
 */
trait HasAttributesTrait
{
    protected array $attributes = [];

    public function fill(array $data): self
    {
        foreach ($data as $key => $value) {
            $this->setAttribute($key, $value);
        }
        return $this;
    }

    public function setAttributes(array $attributes): self
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    public function hasAttribute($key): bool
    {
        foreach ((array) $key as $prop) {
            if (null === $this->getAttribute($prop)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param null $default
     *
     * @return mixed
     */
    public function getPropertyRaw(string $key, $default = null)
    {
        if (property_exists($this, $key)) {
            return $this->{$key};
        }

        return $this->getAttribute($key, $default);
    }

    /**
     * Get an attribute from the model.
     *
     * @return mixed|void
     */
    public function getAttribute(string $key, $default = null)
    {
        if (empty($key)) {
            throw new \InvalidArgumentException('Please provide a key argument');
        }
        if (!\array_key_exists($key, $this->attributes)) {
            return $default;
        }

        return $this->attributes[$key];
    }

    /**
     * @return $this
     *
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setAttribute($key, $value)
    {
        $method = 'set'.ucfirst(Helper::camelCase($key));
        if (method_exists($this, $method)) {
            $this->$method($value);
            return $this;
        }

        $this->attributes[$key] = $value;
        return $this;
    }

    public function unsetAttribute($key)
    {
        if ($this->hasAttribute($key)) {
            unset($this->attributes[$key]);
        }
    }
}
