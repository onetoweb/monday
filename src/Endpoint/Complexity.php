<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Query;
use Onetoweb\Monday\Payload\PayloadInterface;

/**
 * Complexity Endpoint.
 */
class Complexity extends AbstractEndpoint
{
    /**
     * @param array $fields
     * @param PayloadInterface $payload
     * 
     * @return array
     */
    public function test(array $fields, PayloadInterface $payload): array
    {
        $query = new Query('query', [], [
            new Query('complexity', [], $fields),
            $payload
        ]);
        
        return $this->client->request($query);
    }
}