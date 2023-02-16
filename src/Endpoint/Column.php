<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Query;

/**
 * Column Endpoint.
 */
class Column extends AbstractEndpoint
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
                new Query('columns', [], $fields)
            ])
        ]);
        
        return $this->client->request($query);
    }
}