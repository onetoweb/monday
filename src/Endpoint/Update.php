<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Payload;

/**
 * Update Endpoint.
 */
class Update extends AbstractEndpoint
{
    /**
     * @param array $fields = []
     * @param array $arguments = []
     *
     * @return array
     */
    public function read(array $fields = [], array $arguments = []): array
    {
        $fields[] = new Payload('creator', [], [
            'name',
            'id'
        ]);
        
        $payload = new Payload('query', [], [
            new Payload('updates', $arguments, $fields),
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param string $body
     * @param int $itemId
     * @param int $parentId = null
     * 
     * @return array
     */
    public function create(string $body, int $itemId, int $parentId = null): array
    {
        $data = [
            'body' => $body,
            'item_id' => $itemId
        ];
        
        if ($parentId !== null) {
            $data['parent_id'] = $parentId;
        }
        
        $payload = new Payload('mutation', [], [
            new Payload('create_update ', $data, ['id'])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $id
     *
     * @return array
     */
    public function delete(int $id): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('delete_update ', ['id' => $id], ['id'])
        ]);
        
        return $this->client->request($payload);
    }
}