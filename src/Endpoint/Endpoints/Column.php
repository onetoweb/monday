<?php

namespace Onetoweb\Monday\Endpoint\Endpoints;

use Onetoweb\Monday\Endpoint\AbstractEndpoint;
use Onetoweb\Monday\Payload\Payload;

/**
 * Column Endpoint.
 */
class Column extends AbstractEndpoint
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
                new Payload('columns', [], $fields)
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param array $data
     * 
     * @return array
     */
    public function create(array $data): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('create_column', $data, ['id'])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $boardId
     * @param int $itemId
     * @param string $columnId
     * @param string $value
     * 
     * @return array
     */
    public function updateSimpleValue(int $boardId, int $itemId, string $columnId, string $value): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('change_simple_column_value', [
                'board_id' => $boardId,
                'item_id' => $itemId,
                'column_id' => $columnId,
                'value' => $value
            ], ['id'])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $boardId
     * @param int $itemId
     * @param string $columnId
     * @param array $value
     * 
     * @return array
     */
    public function updateValue(int $boardId, int $itemId, string $columnId, array $value): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('change_column_value', [
                'board_id' => $boardId,
                'item_id' => $itemId,
                'column_id' => $columnId,
                'value' => $value
            ], ['id'])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $boardId
     * @param int $itemId
     * @param array $value
     * 
     * @return array
     */
    public function updateMultipleValues(int $boardId, int $itemId, array $value): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('change_multiple_column_values', [
                'board_id' => $boardId,
                'item_id' => $itemId,
                'column_values' => $value
            ], ['id'])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $boardId
     * @param string $columnId
     * @param string $title
     * 
     * @return array
     */
    public function updateTitle(int $boardId, string $columnId, string $title): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('change_column_title', [
                'board_id' => $boardId,
                'column_id' => $columnId,
                'title' => $title
            ], ['id'])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $boardId
     * @param string $columnId
     * @param string $columnProperty
     * @param string $value
     * 
     * @return array
     */
    public function updateMetadata(int $boardId, string $columnId, string $columnProperty, string $value): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('change_column_metadata', [
                'board_id' => $boardId,
                'column_id' => $columnId,
                'column_property' => $columnProperty,
                'value' => $value
            ], [
                'id',
                'title',
                'description'
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $boardId
     * @param string $columnId
     * 
     * @return array
     */
    public function delete(int $boardId, string $columnId): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('delete_column', [
                'board_id' => $boardId,
                'column_id' => $columnId
            ], ['id'])
        ]);
        
        return $this->client->request($payload);
    }
}