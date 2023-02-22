<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Payload;

/**
 * File Endpoint.
 */
class File extends AbstractEndpoint
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
            new Payload('assets', $arguments, $fields)
        ]);
        
        return $this->client->request($payload);
    }
}