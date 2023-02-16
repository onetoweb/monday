<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Query;

/**
 * App Subscription Endpoint.
 */
class AppSubscription extends AbstractEndpoint
{
    /**
     * @param array $fields = []
     * 
     * @return array
     */
    public function read(array $fields = []): array
    {
        $query = new Query('query', [], [
            new Query('app_subscription', [], $fields)
        ]);
        
        return $this->client->request($query);
    }
}