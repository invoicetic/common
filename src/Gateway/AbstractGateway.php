<?php

namespace Invoicetic\Common\Gateway;

use Http\Discovery\Psr18ClientDiscovery;
use Invoicetic\Common\Base\Behaviours\HasParametersTrait;
use Invoicetic\Common\Dto\Invoice\Invoice;
use Invoicetic\Common\Utility\Helper;
use Psr\Http\Client\ClientInterface;
use ReflectionClass;
use RuntimeException;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

abstract class AbstractGateway implements GatewayInterface
{
    use HasParametersTrait;

    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @var HttpRequest
     */
    protected $httpRequest;


    /**
     * Create a new gateway instance
     *
     * @param ClientInterface $httpClient A HTTP client to make API calls with
     * @param HttpRequest $httpRequest A Symfony HTTP request object
     */
    public function __construct(ClientInterface $httpClient = null, HttpRequest $httpRequest = null)
    {
        $this->httpClient = $httpClient ?: $this->getDefaultHttpClient();
        $this->httpRequest = $httpRequest ?: $this->getDefaultHttpRequest();
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


    /**
     * Get the global default HTTP client.
     *
     * @return ClientInterface
     */
    protected function getDefaultHttpClient()
    {
        return Psr18ClientDiscovery::find();
    }

    /**
     * Get the global default HTTP request.
     *
     * @return HttpRequest
     */
    protected function getDefaultHttpRequest()
    {
        return HttpRequest::createFromGlobals();
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