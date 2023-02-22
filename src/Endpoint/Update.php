<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Payload;

/**
 * Update Endpoint.
 */
class Update extends AbstractEndpoint
{
    /**
     * @param array $fields = []
     * @param array $arguments = []
     *
     * @return array
     */
    public function read(array $fields = [], array $arguments = []): array
    {
        $fields[] = new Payload('creator', [], [
            'name',
            'id'
        ]);
        
        $payload = new Payload('query', [], [
            new Payload('updates', $arguments, $fields),
        ]);
        
        return $this->client->request($payload);
    }
}