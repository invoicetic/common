<?php

namespace Invoicetic\Common\Base\Behaviours;

use Invoicetic\Common\Exception\InvalidRequestException;
use Invoicetic\Common\Utility\Helper;
use Symfony\Component\HttpFoundation\ParameterBag;

trait HasParametersTrait
{
    /**
     * Internal storage of all of the parameters.
     *
     * @var ParameterBag
     */
    protected $parameters;

    /**
     * Set one parameter.
     *
     * @param string $key Parameter key
     * @param mixed $value Parameter value
     * @return $this
     */
    protected function setParameter($key, $value)
    {
        $this->parameters->set($key, $value);

        return $this;
    }

    /**
     * Get one parameter.
     *
     * @param string $key Parameter key
     * @return mixed A single parameter value.
     */
    protected function getParameter($key)
    {
        return $this->parameters->get($key);
    }

    /**
     * Get all parameters.
     *
     * @return array An associative array of parameters.
     */
    public function getParameters()
    {
        return $this->parameters->all();
    }

    /**
     * Initialize the object with parameters.
     *
     * If any unknown parameters passed, they will be ignored.
     *
     * @param array $parameters An associative array of parameters
     * @return $this.
     */
    public function initializeParams(array $parameters = [])
    {
        $this->parameters = new ParameterBag;

        // set default parameters
        foreach ($this->getDefaultParameters() as $key => $value) {
            if (is_array($value)) {
                $this->parameters->set($key, reset($value));
            } else {
                $this->parameters->set($key, $value);
            }
        }

        Helper::initialize($this, $parameters);
        return $this;
    }

    /**
     * Validate the request.
     *
     * This method is called internally by gateways to avoid wasting time with an API call
     * when the request is clearly invalid.
     *
     * @param string ... a variable length list of required parameters
     * @throws InvalidRequestException
     */
    public function validateParameters(...$args): void
    {
        foreach ($args as $key) {
            $value = $this->parameters->get($key);
            if (!isset($value)) {
                throw new InvalidRequestException("The $key parameter is required");
            }
        }
    }

    /**
     * @return array
     */
    public function getDefaultParameters(): array
    {
        return array();
    }
}