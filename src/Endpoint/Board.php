<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Payload;

/**
 * Board Endpoint.
 */
class Board extends AbstractEndpoint
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
            new Payload('boards', $arguments, $fields)
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param array $data = []
     * 
     * @return array
     */
    public function create(array $data = []): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('create_board', $data, ['id'])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $id
     * @param string $field
     * @param string $newValue
     * 
     * @return array
     */
    public function update(int $id, string $field, string $newValue): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('update_board', [
                'board_id' => $id,
                'board_attribute' => $field,
                'new_value' => $newValue
            ])
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
            new Payload('delete_board', [
                'board_id' => $id
            ], [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $id
     * 
     * @return array
     */
    public function archive(int $id): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('archive_board', [
                'board_id' => $id
            ], [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param array $data
     * 
     * @return array
     */
    public function duplicate(array $data): array {
        
        $payload = new Payload('mutation', [], [
            new Payload('duplicate_board', $data, [
                new Payload('board', [], [
                    'id'
                ])
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $id
     * @param array $teamIds = []
     * 
     * @return array
     */
    public function addTeams(int $id, array $teamIds = []): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('add_teams_to_board ', [
                'board_id' => $id,
                'team_ids' => $teamIds
            ], [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
}