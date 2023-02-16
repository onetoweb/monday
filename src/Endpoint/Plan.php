<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Query;

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
        $query = new Query('query', [], [
            new Query('account', [], [
                new Query('plan', [], $fields)
            ])
        ]);
        
        return $this->client->request($query);
    }
}