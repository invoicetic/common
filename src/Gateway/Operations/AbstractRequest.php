<?php

namespace Invoicetic\Common\Gateway\Operations;

use Psr\Http\Client\ClientInterface;
use RuntimeException;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

abstract class AbstractRequest
{
    use \Invoicetic\Common\Base\Behaviours\HasParametersTrait
    {
        setParameter as traitSetParameter;
    }

    /**
     * An associated ResponseInterface.
     *
     * @var ResponseInterface
     */
    protected $response;

    /**
     * Create a new Request
     *
     * @param ClientInterface $httpClient  A HTTP client to make API calls with
     * @param HttpRequest     $httpRequest A Symfony HTTP request object
     */
    public function __construct(ClientInterface $httpClient, HttpRequest $httpRequest)
    {
        $this->httpClient = $httpClient;
        $this->httpRequest = $httpRequest;
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
     * @return ResponseInterface
     */
    public function send()
    {
        $data = $this->getData();

        return $this->sendData($data);
    }

    /**
     * Get the associated Response.
     *
     * @return ResponseInterface
     */
    public function getResponse()
    {
        if (null === $this->response) {
            throw new RuntimeException('You must call send() before accessing the Response!');
        }

        return $this->response;
    }
}