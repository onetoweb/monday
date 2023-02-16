<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Query;

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
        $fields[] = new Query('creator', [], [
            'name',
            'id'
        ]);
        
        $query = new Query('query', [], [
            new Query('updates', $arguments, $fields),
        ]);
        
        return $this->client->request($query);
    }
}