<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Query;

/**
 * Board View Endpoint.
 */
class BoardView extends AbstractEndpoint
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
                new Query('views', [], $fields)
            ])
        ]);
        
        return $this->client->request($query);
    }
}