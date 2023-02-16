<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\{Query, Mutation};

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
        $query = new Query('query', [], [
            new Query('boards', $arguments, $fields)
        ]);
        
        return $this->client->request($query);
    }
    
    /**
     * @param array $data = []
     * 
     * @return array
     */
    public function create(array $data = []): array
    {
        $mutation = new Mutation('create_board', $data, ['id']);
        
        return $this->client->request($mutation);
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
        $mutation = new Mutation('update_board', [
            'board_id' => $id,
            'board_attribute' => $field,
            'new_value' => $newValue
        ]);
        
        return $this->client->request($mutation);
    }
    
    /**
     * @param int $id
     * 
     * @return array
     */
    public function delete(int $id): array
    {
        $mutation = new Mutation('delete_board', [
            'board_id' => $id
        ], [
            'id'
        ]);
        
        return $this->client->request($mutation);
    }
    
    /**
     * @param int $id
     *
     * @return array
     */
    public function archive(int $id): array
    {
        $mutation = new Mutation('archive_board', [
            'board_id' => $id
        ], [
            'id'
        ]);
        
        return $this->client->request($mutation);
    }
    
    /**
     * @param int $id
     * @param array $teamIds = []
     *
     * @return array
     */
    public function addTeams(int $id, array $teamIds = []): array
    {
        $mutation = new Mutation('add_teams_to_board ', [
            'board_id' => $id,
            'team_ids' => $teamIds
        ], [
            'id'
        ]);
        
        return $this->client->request($mutation);
    }
}