<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Query;

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
        $query = new Query('query', [], [
            new Query('boards', $boardArguments, [
                new Query('items', $itemArguments, [
                    new Query('column_values', [], $fields)
                ])
            ])
        ]);
        
        return $this->client->request($query);
    }
}