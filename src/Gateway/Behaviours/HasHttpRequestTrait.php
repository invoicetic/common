<?php

namespace Invoicetic\Common\Gateway\Behaviours;

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

    protected function createRequest($method, $url, $headers = [], $body = [], $cookie = []): \Psr\Http\Message\RequestInterface
    {
        $request = $this->getRequestFactory()->createServerRequest($method, $url, $headers);

        $stringBody = is_array($body) ? json_encode($body, JSON_THROW_ON_ERROR) : $body;
        $body = Psr17FactoryDiscovery::findStreamFactory()->createStream($stringBody);

        return $request
            ->withBody($body)
            ->withCookieParams($cookie ?? []);
    }
}