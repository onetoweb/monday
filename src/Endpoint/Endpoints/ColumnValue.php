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
     * @param array $itemArguments = []
     * 
     * @return array
     */
    public function readByItem(array $fields = [], array $itemArguments = []): array
    {
        $payload = new Payload('query', [], [
            new Payload('items', $itemArguments, [
                new Payload('column_values', [], $fields)
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param array $fields = []
     * @param array $itemFields = []
     * @param array $boardArguments = []
     * @param array $itemPageArguments = []
     * 
     * @return array
     */
    public function readByBoard(array $fields = [], array $itemFields = [], array $boardArguments = [], array $itemPageArguments = []): array
    {
        $itemFields[] = new Payload('column_values', [], $fields);
        
        $payload = new Payload('query', [], [
            new Payload('boards', $boardArguments, [
                new Payload('items_page', $itemPageArguments, [
                    'cursor',
                    new Payload('items', [], $itemFields)
                ])
            ])
        ]);
        
        return $this->client->request($payload);
    }
}