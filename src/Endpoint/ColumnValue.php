<?php

namespace Onetoweb\Monday\Endpoint;

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
                new Payload('items', $itemArguments, [
                    new Payload('column_values', [], $fields)
                ])
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param array $boardFields = []
     * @param array $itemFields = []
     * @param array $columnValueFields = []
     * @param array $boardArguments = []
     * @param array $itemArguments = []
     * @param array $columnValueArguments = []
     *
     * @return array
     */
    public function readExtended(array $boardFields = [], array $itemFields = [], array $columnValueFields = [], array $boardArguments = [], array $itemArguments = [], array $columnValueArguments = []): array
    {
        $itemFields[] = new Payload('column_values', $columnValueArguments, $columnValueFields);
        $boardFields[] = new Payload('items', $itemArguments, $itemFields);
        
        $payload = new Payload('query', [], [
            new Payload('boards', $boardArguments, $boardFields)
        ]);
        
        return $this->client->request($payload);
    }
}