<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Payload;

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
        $payload = new Payload('query', [], [
            new Payload('workspaces', [], $fields)
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
            new Payload('create_workspace', $data, ['id'])
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
            new Payload('delete_workspace', [
                'workspace_id' => $id,
            ], [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
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
        
        $payload = new Payload('mutation', [], [
            new Payload('add_users_to_workspace', $data, ['id'])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $id
     * @param array $userIds
     * 
     * @return array
     */
    public function removeUsers(int $id, array $userIds): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('delete_users_from_workspace', [
                'workspace_id' => $id,
                'user_ids' => $userIds
            ], [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $id
     * @param array $teamIds
     * 
     * @return array
     */
    public function addTeams(int $id, array $teamIds): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('add_teams_to_workspace', [
                'workspace_id' => $id,
                'team_ids' => $teamIds
            ], ['id'])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $id
     * @param array $teamIds
     * 
     * @return array
     */
    public function removeTeams(int $id, array $teamIds): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('delete_teams_from_workspace', [
                'workspace_id' => $id,
                'team_ids' => $teamIds
            ], ['id'])
        ]);
        
        return $this->client->request($payload);
    }
}