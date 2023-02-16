<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Query;

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
        $query = new Query('query', [], [
            new Query('users', [], [
                new Query('account', [], $fields)
            ])
        ]);
        
        return $this->client->request($query);
    }
}