<?php

namespace Invoicetic\Common\Gateway;


abstract class HttpGateway extends AbstractGateway
{
    use Behaviours\HasSandboxTrait;
    use Behaviours\HasHttpEndpointTrait;

    protected function generateEndpoint()
    {
        var_dump($this->isSandbox());
        return $this->isSandbox() ? $this->getSandboxEndpoint() : $this->getProductionEndpoint();
    }

    protected function getSandboxEndpoint()
    {
        return defined(static::class . '::ENDPOINT_SANDBOX') ? static::ENDPOINT_SANDBOX : null;
    }

    protected function getProductionEndpoint()
    {
        return defined(static::class . '::ENDPOINT_PRODUCTION') ? static::ENDPOINT_PRODUCTION : null;
    }

    public function getDefaultParameters(): array
    {
        $params = parent::getDefaultParameters();
        $params['endpoint'] = $this->getEndpoint();
        return $params;
    }
}