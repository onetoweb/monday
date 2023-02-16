<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Query;

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
        $query = new Query('query', [], [
            new Query('me', [], $fields)
        ]);
        
        return $this->client->request($query);
    }
}