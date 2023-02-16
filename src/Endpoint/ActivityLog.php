<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Query;

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
        $query = new Query('query', [], [
            new Query('boards', $boardArguments, [
                new Query('activity_logs ', $activityArguments, $fields)
            ])
        ]);
        
        return $this->client->request($query);
    }
}