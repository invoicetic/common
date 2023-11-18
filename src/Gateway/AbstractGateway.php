<?php

namespace Invoicetic\Common\Gateway;

use Invoicetic\Common\Base\Behaviours\HasParametersTrait;
use Invoicetic\Common\Dto\Invoice\Invoice;
use Invoicetic\Common\Gateway\Behaviours\HasHttpClientTrait;
use Invoicetic\Common\Gateway\Behaviours\HasHttpEndpointTrait;
use Invoicetic\Common\Gateway\Behaviours\HasHttpRequestTrait;
use Invoicetic\Common\Gateway\Behaviours\HasSandboxTrait;
use Invoicetic\Common\Utility\Helper;
use Psr\Http\Client\ClientInterface;
use ReflectionClass;
use RuntimeException;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

abstract class AbstractGateway implements GatewayInterface
{
    use HasParametersTrait;
    use HasHttpClientTrait;
    use HasHttpRequestTrait;
    use HasHttpEndpointTrait;
    use HasSandboxTrait;

    /**
     * Create a new gateway instance
     *
     * @param ClientInterface $httpClient A HTTP client to make API calls with
     * @param HttpRequest $httpRequest A Symfony HTTP request object
     */
    public function __construct(ClientInterface $httpClient = null, HttpRequest $httpRequest = null)
    {
        $this->initHttpClient($httpClient, true);
        $this->initHttpRequest($httpRequest, true);
        $this->initialize();
    }

    /**
     * Get the short name of the Gateway
     *
     * @return string
     */
    public function getShortName()
    {
        return Helper::getGatewayShortName(get_class($this));
    }

    /**
     * Initialize this gateway with default parameters
     *
     * @param array $parameters
     * @return $this
     */
    public function initialize(array $parameters = array())
    {
        $this->initializeParams($parameters);

        return $this;
    }

    protected function createRequest($class, mixed $parameters)
    {
        $obj = new $class($this->httpClient, $this->httpRequest);

        return $obj->initialize(array_replace($this->getParameters(), $parameters));
    }

    public function createInvoice(Invoice $invoice, array $parameters = [])
    {
        $parameters['invoice'] = $invoice;

        return $this->createRequest(
            $this->createRequestClass(GatewayInterface::OPERATION_CREATE_INVOICE),
            $parameters
        );
    }

    protected function createRequestClass(string $operation): string
    {
        $operation = ucfirst($operation);
        $class = $this->operationNamespace() . '\\Operations\\' . $operation . 'Request';
        if (!class_exists($class)) {
            throw new RuntimeException("Class '$class' not found");
        }

        return $class;
    }

    protected function operationNamespace(): string
    {
        $reflection_class = new ReflectionClass(get_class($this));
        return $reflection_class->getNamespaceName();
    }
}