<?php

namespace Invoicetic\Common\Gateway\Behaviours;

trait HasHttpEndpointTrait
{
    protected $endpoint = null;

    /**
     * @return null
     */
    public function getEndpoint()
    {
        if ($this->endpoint == null) {
            $this->endpoint = $this->generateEndpoint();
        }
        return $this->endpoint;
    }

    /**
     * @param null $endpoint
     */
    public function setEndpoint($endpoint): void
    {
        $this->endpoint = $endpoint;
    }

    abstract protected function generateEndpoint();

}

