<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\{Query, Mutation};

/**
 * Workspace Endpoint.
 */
class Workspace extends AbstractEndpoint
{
    /**
     * @param array $fields = []
     * 
     * @return array
     */
    public function read(array $fields = []): array
    {
        $query = new Query('query', [], [
            new Query('workspaces', [], $fields)
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
        $mutation = new Mutation('create_workspace', $data, ['id']);
        
        return $this->client->request($mutation);
    }
    
    /**
     * @param int $id
     * 
     * @return array
     */
    public function delete(int $id): array
    {
        $mutation = new Mutation('delete_workspace', [
            'workspace_id' => $id,
        ], ['id']);
        
        return $this->client->request($mutation);
    }
    
    /**
     * @param int $id
     * @param array $userIds
     * @param string $kind = null
     * 
     * @return array
     */
    public function addUsers(int $id, array $userIds, string $kind = null): array
    {
        $data = [
            'workspace_id' => $id,
            'user_ids' => $userIds
        ];
        
        if ($kind !== null) {
            $data['kind'] = $kind;
        }
        
        $mutation = new Mutation('add_users_to_workspace', $data, ['id']);
        
        return $this->client->request($mutation);
    }
    
    /**
     * @param int $id
     * @param array $userIds
     * 
     * @return array
     */
    public function removeUsers(int $id, array $userIds): array
    {
        $mutation = new Mutation('delete_users_from_workspace', [
            'workspace_id' => $id,
            'user_ids' => $userIds
        ], ['id']);
        
        return $this->client->request($mutation);
    }
    
    /**
     * @param int $id
     * @param array $teamIds
     * 
     * @return array
     */
    public function addTeams(int $id, array $teamIds): array
    {
        $mutation = new Mutation('add_teams_to_workspace', [
            'workspace_id' => $id,
            'team_ids' => $teamIds
        ], ['id']);
        
        return $this->client->request($mutation);
    }
    
    /**
     * @param int $id
     * @param array $teamIds
     * 
     * @return array
     */
    public function removeTeams(int $id, array $teamIds): array
    {
        $mutation = new Mutation('delete_teams_from_workspace', [
            'workspace_id' => $id,
            'team_ids' => $teamIds
        ], ['id']);
        
        return $this->client->request($mutation);
    }
}