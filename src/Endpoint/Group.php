<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Query;

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
        $query = new Query('query', [], [
            new Query('boards', $arguments, [
                new Query('groups', [], $fields)
            ])
        ]);
        
        return $this->client->request($query);
    }
}