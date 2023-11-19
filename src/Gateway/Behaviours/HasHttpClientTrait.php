<?php

namespace Invoicetic\Common\Gateway\Behaviours;

use Http\Client\Common\Plugin\ContentLengthPlugin;
use Http\Client\Common\Plugin\ContentTypePlugin;
use Http\Client\Common\Plugin\ErrorPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\Psr18Client;
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
        $client = $client ?: null;
        if ($auto && !$client) {
            $client = $this->getDefaultHttpClient();
        }
        $this->httpClient = $client;
    }

    /**
     * Get the global default HTTP client.
     *
     * @return PluginClient
     */
    protected function getDefaultHttpClient()
    {
        $client = Psr18ClientDiscovery::find();
        $plugins[] = new ErrorPlugin();
        $plugins[] = new ContentLengthPlugin();
        $plugins[] = new ContentTypePlugin();
        return new PluginClient($client, $plugins);
    }

}