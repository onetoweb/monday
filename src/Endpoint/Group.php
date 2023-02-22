<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Payload;

/**
 * Group Endpoint.
 */
class Group extends AbstractEndpoint
{
    /**
     * @param array $fields = []
     * @param array $arguments = []
     * 
     * @return array
     */
    public function read(array $fields = [], array $arguments = []): array
    {
        $payload = new Payload('query', [], [
            new Payload('boards', $arguments, [
                new Payload('groups', [], $fields)
            ])
        ]);
        
        return $this->client->request($payload);
    }
}