<?php

namespace Onetoweb\Monday\Endpoint\Endpoints;

use Onetoweb\Monday\Endpoint\AbstractEndpoint;
use Onetoweb\Monday\Payload\Payload;

/**
 * Notification Endpoint.
 */
class Notification extends AbstractEndpoint
{
    /**
     * @param int $userId
     * @param int $targetId
     * @param string $text
     * @param string $type
     * 
     * @return array
     */
    public function create(int $userId, int $targetId, string $text, string $type): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('create_notification', [
                'user_id'=> $userId,
                'target_id' => $targetId,
                'text' => $text,
                'target_type' => $type,
            ], [
                'text'
            ])
        ]);
        
        return $this->client->request($payload);
    }
}