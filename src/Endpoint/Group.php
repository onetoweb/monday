<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Payload;

/**
 * Group Endpoint.
 */
class Group extends AbstractEndpoint
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
                new Payload('groups', [], $fields)
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $boardId
     * @param string $name
     * @param string $position = null
      
     * @return array
     */
    public function create(int $boardId, string $name, string $position = null): array
    {
        $data = [
            'board_id' => $boardId,
            'group_name' => $name,
        ];
        
        if ($position !== null) {
            $data['position'] = '"'.$position.'"';
        }
        
        $payload = new Payload('mutation', [], [
            new Payload('create_group', $data, [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $boardId
     * @param string $groupId
     * @param string $attribute
     * @param string $value
     * 
     * @return array
     */
    public function update(int $boardId, string $groupId, string $attribute, string $value): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('update_group', [
                'board_id' => $boardId,
                'group_id' => $groupId,
                'group_attribute' => $attribute,
                'new_value' => $value,
            ], [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $boardId
     * @param string $groupId
     * @param bool $addToTop
     * @param string $title = null
     * 
     * @return array
     */
    public function duplicate(int $boardId, string $groupId, bool $addToTop, string $title = null): array
    {
        $data = [
            'board_id' => $boardId,
            'group_id' => $groupId,
            'add_to_top' => $addToTop
        ];
        
        if ($title !== null) {
            $data['group_title'] = $title;
        }
        
        $payload = new Payload('mutation', [], [
            new Payload('duplicate_group', $data, [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $boardId
     * @param string $groupId
     * 
     * @return array
     */
    public function archive(int $boardId, string $groupId): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('archive_group', [
                'board_id' => $boardId,
                'group_id' => $groupId
            ], [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $boardId
     * @param string $groupId
     *
     * @return array
     */
    public function delete(int $boardId, string $groupId): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('delete_group', [
                'board_id' => $boardId,
                'group_id' => $groupId
            ], [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
}