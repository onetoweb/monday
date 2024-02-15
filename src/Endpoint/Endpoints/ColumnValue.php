<?php

namespace Onetoweb\Monday\Endpoint\Endpoints;

use Onetoweb\Monday\Endpoint\AbstractEndpoint;
use Onetoweb\Monday\Payload\Payload;

/**
 * Column Value Endpoint.
 */
class ColumnValue extends AbstractEndpoint
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
                new Payload('items_page', $itemArguments, [
                    new Payload('items', [], [
                        new Payload('column_values', [], [
                            new Payload('column', [], $fields)
                        ])
                    ])
                ])
            ])
        ]);
        
        return $this->client->request($payload);
    }
}