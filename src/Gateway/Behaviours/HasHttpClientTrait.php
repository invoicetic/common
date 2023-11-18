<?php

namespace Invoicetic\Common\Gateway\Behaviours;

use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientInterface;

trait HasHttpClientTrait
{
    /**
     * @var ClientInterface|null
     */
    protected ClientInterface|null $httpClient = null;

    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    public function setHttpClient(ClientInterface $httpClient): void
    {
        $this->httpClient = $httpClient;
    }

    public function initHttpClient($client, $auto = true): void
    {
        $client = $client ? $client: null;
        if ($auto && !$client) {
            $client = $this->getDefaultHttpClient();
        }
        $this->httpClient = $client;
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

}