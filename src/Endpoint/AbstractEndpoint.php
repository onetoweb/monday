<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Client;

/**
 * Abstract Endpoint.
 */
class AbstractEndpoint implements EndpointInterface
{
    /**
     * @var Client
     */
    protected $client;
    
    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}