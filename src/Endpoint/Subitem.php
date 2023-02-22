<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Payload;

/**
 * Subitem Endpoint.
 */
class Subitem extends AbstractEndpoint
{
    /**
     * @param array $fields = []
     * @param array $boardArguments = []
     * @param array $itemArguments = []
     * 
     * @return array
     */
    public function read(array $fields = [], array $boardArguments = [], array $itemArguments = []): array
    {
        $payload = new Payload('query', [], [
            new Payload('boards', $boardArguments, [
                new Payload('items', $itemArguments, [
                    new Payload('subitems ', [], $fields)
                ])
            ])
        ]);
        
        return $this->client->request($payload);
    }
}