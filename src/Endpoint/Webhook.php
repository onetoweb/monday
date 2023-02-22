<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Payload;

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
        $payload = new Payload('query', [], [
            new Payload('webhooks', $arguments, $fields)
        ]);
        
        return $this->client->request($payload);
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
        
        $payload = new Payload('mutation', [], [
            new Payload('create_webhook', $data, ['id', 'board_id'])
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
            new Payload('delete_webhook', ['id' => $id], ['id', 'board_id'])
        ]);
        
        return $this->client->request($payload);
    }
}