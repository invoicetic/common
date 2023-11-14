<?php

namespace Invoicetic\Common\Gateway;

use Http\Discovery\Psr18ClientDiscovery;
use Invoicetic\Common\Utility\Helper;
use Psr\Http\Client\ClientInterface;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

class AbstractGateway
{
    use \Invoicetic\Common\Base\Behaviours\HasParametersTrait;

    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @var \Symfony\Component\HttpFoundation\Request
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

    protected function createRequest($class, array $parameters)
    {
        $obj = new $class($this->httpClient, $this->httpRequest);

        return $obj->initialize(array_replace($this->getParameters(), $parameters));
    }
}