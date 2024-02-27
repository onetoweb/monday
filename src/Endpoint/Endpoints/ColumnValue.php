<?php

namespace Onetoweb\Monday\Endpoint\Endpoints;

use Onetoweb\Monday\Endpoint\AbstractEndpoint;
use Onetoweb\Monday\Payload\Payload;
use Onetoweb\Monday\Utils;

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
    
    /**
     * @param array $fields = []
     * @param array $itemFields = []
     * @param array $boardArguments = []
     * 
     * @return array
     */
    public function readAllByBoard(array $fields = [], array $itemFields = [], array $boardArguments = []): array
    {
        $results = [];
        
        $cursor = null;
        do {
            
            $result = $this->readByBoard($fields, $itemFields, $boardArguments, [
                'limit' => 500,
                'cursor' => $cursor
            ]);
            
            // find cursor in result
            $cursor = Utils::findCursor($result);
            
            // check  for item data
            if (
                isset($result['data']['boards'][0]['items_page']['items'])
                and is_array($result['data']['boards'][0]['items_page']['items'])
            ) {
                
                // add item to result
                foreach ($result['data']['boards'][0]['items_page']['items'] as $item) {
                    
                    $results[] = $item;
                }
                
            } else {
                
                return $result;
            }
        }
        while ($cursor !== null);
        
        return $results;
    }
}
