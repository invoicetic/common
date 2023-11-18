<?php

namespace Invoicetic\Common\Gateway\Operations;

use Invoicetic\Common\Base\Behaviours\HasParametersTrait;
use Invoicetic\Common\Gateway\Behaviours\HasHttpClientTrait;
use Invoicetic\Common\Gateway\Behaviours\HasHttpRequestTrait;
use Psr\Http\Client\ClientInterface;
use RuntimeException;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

abstract class AbstractRequest
{
    use HasParametersTrait
    {
        setParameter as traitSetParameter;
    }
    use HasHttpClientTrait;
    use HasHttpRequestTrait;

    /**
     * An associated AbstractResponse.
     *
     * @var AbstractResponse|null
     */
    protected ?AbstractResponse $response = null;

    /**
     * Create a new Request
     *
     * @param ClientInterface $httpClient  A HTTP client to make API calls with
     * @param HttpRequest     $httpRequest A Symfony HTTP request object
     */
    public function __construct(ClientInterface $httpClient, HttpRequest $httpRequest)
    {
        $this->initHttpClient($httpClient);
        $this->initHttpRequest($httpRequest);
        $this->initialize();
    }


    /**
     * Initialize the object with parameters.
     *
     * If any unknown parameters passed, they will be ignored.
     *
     * @param array $parameters An associative array of parameters
     *
     * @return $this
     * @throws RuntimeException
     */
    public function initialize(array $parameters = array())
    {
        if (null !== $this->response) {
            throw new RuntimeException('Request cannot be modified after it has been sent!');
        }

        $this->initializeParams($parameters);

        return $this;
    }

    /**
     * Set a single parameter
     *
     * @param string $key The parameter key
     * @param mixed $value The value to set
     * @return $this
     * @throws RuntimeException if a request parameter is modified after the request has been sent.
     */
    protected function setParameter($key, $value)
    {
        if (null !== $this->response) {
            throw new RuntimeException('Request cannot be modified after it has been sent!');
        }

        return $this->traitSetParameter($key, $value);
    }

    /**
     * Send the request
     *
     * @return AbstractResponse
     */
    public function send()
    {
        $data = $this->getData();

        return $this->sendData($data);
    }

    /**
     * Get the associated Response.
     *
     * @return AbstractResponse
     */
    public function getResponse()
    {
        if (null === $this->response) {
            throw new RuntimeException('You must call send() before accessing the Response!');
        }

        return $this->response;
    }

    protected function createResponse($data)
    {
        $response = $this->createResponseClass();
        return $this->response = new $response($this, $data);
    }

    protected function createResponseClass(): string
    {
        return Response::class;
    }

    abstract public function getData();


    abstract public function sendData($data);
}