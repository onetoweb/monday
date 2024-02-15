<?php

namespace Onetoweb\Monday\Endpoint\Endpoints;

use Onetoweb\Monday\Endpoint\AbstractEndpoint;
use Onetoweb\Monday\Payload\Payload;

/**
 * Activity Log Endpoint.
 */
class ActivityLog extends AbstractEndpoint
{
    /**
     * @param array $fields = []
     * @param array $boardArguments = []
     * @param array $activityArguments = []
     * 
     * @return array
     */
    public function read(array $fields = [], array $boardArguments = [], array $activityArguments = []): array
    {
        $payload = new Payload('query', [], [
            new Payload('boards', $boardArguments, [
                new Payload('activity_logs ', $activityArguments, $fields)
            ])
        ]);
        
        return $this->client->request($payload);
    }
}