<?php

namespace Invoicetic\Common\Gateway\Behaviours;

use Http\Discovery\MessageFactoryDiscovery;
use Http\Discovery\Psr17FactoryDiscovery;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

trait HasHttpRequestTrait
{
    /**
     * @var HttpRequest
     */
    protected $httpRequest;

    protected $requestFactory;

    public function getHttpRequest(): HttpRequest
    {
        return $this->httpRequest;
    }

    public function setHttpRequest(HttpRequest $httpRequest): void
    {
        $this->httpRequest = $httpRequest;
    }

    public function initHttpRequest($request, $auto = true): void
    {
        $request = $request ?: null;
        if ($auto && !$request) {
            $request = $this->getDefaultHttpRequest();
        }
        $this->httpRequest = $request;
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

    protected function getRequestFactory(): \Psr\Http\Message\ServerRequestFactoryInterface
    {
        if ($this->requestFactory == null) {
            $this->requestFactory = Psr17FactoryDiscovery::findServerRequestFactory();
        }
        return $this->requestFactory;
    }

    protected function createRequest($method, $url, $headers, $body): \Psr\Http\Message\RequestInterface
    {
        return $this->getRequestFactory()->createRequest($method, $url, $headers, $body);
    }
}