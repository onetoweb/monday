<?php

namespace Onetoweb\Monday\Endpoint\Endpoints;

use Onetoweb\Monday\Endpoint\AbstractEndpoint;
use Onetoweb\Monday\Payload\Payload;

/**
 * Document Endpoint.
 */
class Document extends AbstractEndpoint
{
    /**
     * @param array $fields = []
     * @param array $arguments = []
     * 
     * @return array
     */
    public function read(array $fields = [], array $arguments = []): array
    {
        $payload = new Payload('query', [], [
            new Payload('docs', $arguments, $fields)
        ]);
        
        return $this->client->request($payload);
    }
}