<?php

namespace Invoicetic\Common\Gateway\Operations\Behaviours;

use Invoicetic\Common\Gateway\Behaviours\HasHttpEndpointTrait;
use Psr\Http\Client\ClientInterface;

/**
 * @property ClientInterface $httpClient
 */
trait HasHttpEndpointRequestTrait
{
    use HasHttpEndpointTrait;

    /**
     * {@inheritdoc}
     */
    public function sendData($data)
    {
        $headers = $this->getHeaders();

        $httpRequest = $this->createRequest(
            $this->getHttpMethod(),
            $this->getEndpointUrl(),
            $headers,
            $data
        );
        $httpResponse = $this->httpClient->sendRequest(
            $httpRequest
        );

        return $this->createResponse($httpResponse->getBody()->getContents());
    }


    /**
     * Get HTTP Method.
     * This is nearly always POST but can be over-ridden in sub classes.
     *
     * @return string
     */
    public function getHttpMethod(): string
    {
        return 'GET';
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return [];
    }

    public function getEndpointUrl(): string
    {
        return $this->getEndpoint() . $this->getEndpointUrlPath();
    }

    protected function getEndpointUrlPath(): ?string
    {
        return defined(static::class . '::ENDPOINT') ? static::ENDPOINT : null;
    }

}

