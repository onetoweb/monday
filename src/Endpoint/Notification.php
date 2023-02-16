<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Mutation;

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
        $mutation = new Mutation('create_notification', [
            'user_id'=> $userId,
            'target_id' => $targetId,
            'text' => $text,
            'target_type' => $type,
        ], ['text']);
        
        return $this->client->request($mutation);
    }
}