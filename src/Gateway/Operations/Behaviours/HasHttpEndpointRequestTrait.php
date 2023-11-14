<?php

namespace Invoicetic\Common\Gateway\Operations\Behaviors;

trait HasHttpEndpointRequestTrait
{

    /**
     * {@inheritdoc}
     */
    public function sendData($data)
    {
        $headers = $this->getHeaders();
        $body = $data ? http_build_query($data, '', '&') : null;

        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            $this->getEndpointUrl(),
            $headers,
            $body
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

    abstract public function getEndpointUrl();

}

