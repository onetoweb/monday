<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Payload;

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
        $payload = new Payload('query', [], [
            new Payload('boards', $arguments, [
                new Payload('views', [], $fields)
            ])
        ]);
        
        return $this->client->request($payload);
    }
}