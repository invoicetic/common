<?php

namespace Invoicetic\Common\Gateway;


abstract class HttpGateway extends AbstractGateway
{
    use Behaviours\HasSandboxTrait;
    use Behaviours\HasHttpEndpointTrait;

    protected function generateEndpoint()
    {
        return $this->isSandbox() ? $this->getSandboxEndpoint() : $this->getProductionEndpoint();
    }

    protected function getSandboxEndpoint()
    {
        return defined(self::class.'::ENDPOINT_SANDBOX') ? self::ENDPOINT_SANDBOX : null;
    }

    protected function getProductionEndpoint()
    {
        return defined(self::class.'::ENDPOINT_PRODUCTION') ? self::ENDPOINT_PRODUCTION : null;
    }
}