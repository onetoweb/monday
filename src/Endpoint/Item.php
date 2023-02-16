<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Query;

/**
 * Item Endpoint.
 */
class Item extends AbstractEndpoint
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
                new Query('items', [], $fields)
            ])
        ]);
        
        return $this->client->request($query);
    }
}