<?php

namespace Onetoweb\Monday\Endpoint\Endpoints;

use Onetoweb\Monday\Endpoint\AbstractEndpoint;
use Onetoweb\Monday\Payload\Payload;

/**
 * Account Endpoint.
 */
class Account extends AbstractEndpoint
{
    /**
     * @param array $fields = []
     * 
     * @return array
     */
    public function read(array $fields = []): array
    {
        $payload = new Payload('query', [], [
            new Payload('users', [], [
                new Payload('account', [], $fields)
            ])
        ]);
        
        return $this->client->request($payload);
    }
}