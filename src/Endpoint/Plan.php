<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Payload;

/**
 * Plan Endpoint.
 */
class Plan extends AbstractEndpoint
{
    /**
     * @param array $fields = []
     * 
     * @return array
     */
    public function read(array $fields = []): array
    {
        $payload = new Payload('query', [], [
            new Payload('account', [], [
                new Payload('plan', [], $fields)
            ])
        ]);
        
        return $this->client->request($payload);
    }
}