<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\{Query, Mutation};

/**
 * Webhook Endpoint.
 */
class Webhook extends AbstractEndpoint
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
            new Query('webhooks', $arguments, $fields),
        ]);
        
        return $this->client->request($query);
    }
    
    /**
     * @param int $boardId
     * @param string $url
     * @param string $event
     * @param array $config = []
     *
     * @return array
     */
    public function create(int $boardId, string $url, string $event, array $config = []): array
    {
        $data = [
            'board_id' => $boardId,
            'url' => '"'.$url.'"',
            'event' => $event,
        ];
        
        if (count($config) > 0) {
            $data['config'] = $config;
        }
        
        $query = new Mutation('create_webhook', $data, ['id', 'board_id']);
        
        return $this->client->request($query);
    }
    
    /**
     * @param int $id
     *
     * @return array
     */
    public function delete(int $id): array
    {
        $query = new Mutation('delete_webhook', ['id' => $id], ['id', 'board_id']);
        
        return $this->client->request($query);
    }
}