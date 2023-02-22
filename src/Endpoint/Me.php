<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Payload;

/**
 * Me Endpoint.
 */
class Me extends AbstractEndpoint
{
    /**
     * @param array $fields = []
     * 
     * @return array
     */
    public function read(array $fields = []): array
    {
        $payload = new Payload('query', [], [
            new Payload('me', [], $fields)
        ]);
        
        return $this->client->request($payload);
    }
}