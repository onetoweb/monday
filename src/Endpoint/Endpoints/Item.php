<?php

namespace Onetoweb\Monday\Endpoint\Endpoints;

use Onetoweb\Monday\Endpoint\AbstractEndpoint;
use Onetoweb\Monday\Payload\Payload;

/**
 * Item Endpoint.
 */
class Item extends AbstractEndpoint
{
    /**
     * @param array $fields = []
     * @param array $boardArguments = []
     * @param array $itemArguments = []
     * 
     * @return array
     */
    public function read(array $fields = [], array $boardArguments = [], array $itemPageArguments = []): array
    {
        $payload = new Payload('query', [], [
            new Payload('boards', $boardArguments, [
                new Payload('items_page', $itemPageArguments, [
                    'cursor',
                    new Payload('items', [], $fields)
                ])
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param string $name
     * @param array int $boardId
     * @param string $groupId
     * @param array $values = null
     * @param bool $createLabels = true
     * 
     * @return array
     */
    public function create(string $name, int $boardId, string $groupId, array $values = null, bool $createLabels = true): array
    {
        $data = [
            'item_name' => $name,
            'board_id' => $boardId,
            'group_id' => $groupId
        ]; 
        
        if ($values !== null) {
            $data['column_values'] = $values;
            $data['create_labels_if_missing'] = $createLabels;
        }
        
        $payload = new Payload('mutation', [], [
            new Payload('create_item', $data, [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $parentItemId
     * @param string $name
     * @param array $values = null
     * @param bool $createLabels = true
     * 
     * @return array
     */
    public function createSubitem(int $parentItemId, string $name, array $values = null, bool $createLabels = true): array
    {
        return $this->client->subitem->create($parentItemId, $name, $values, $createLabels);
    }
    
    /**
     * @param int $itemId
     * 
     * @return array
     */
    public function clearUpdates(int $itemId): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('clear_item_updates', [
                'item_id' => $itemId
            ], [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $itemId
     * @param string $groupId
     * 
     * @return array
     */
    public function moveToGroup(int $itemId, string $groupId): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('move_item_to_group', [
                'item_id' => $itemId,
                'group_id' => $groupId
            ], [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $itemId
     * 
     * @return array
     */
    public function archive(int $itemId): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('archive_item', [
                'item_id' => $itemId
            ], [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $itemId
     * 
     * @return array
     */
    public function delete(int $itemId): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('delete_item', [
                'item_id' => $itemId
            ], [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $boardId
     * @param int $itemId
     * @param bool $withUpdates = true
     * 
     * @return array
     */
    public function duplicate(int $boardId, int $itemId, bool $withUpdates = true): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('duplicate_item', [
                'board_id' => $boardId,
                'item_id' => $itemId,
                'with_updates' => $withUpdates
            ], [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
}