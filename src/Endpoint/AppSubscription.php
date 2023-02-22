<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Payload;

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
        $payload = new Payload('query', [], [
            new Payload('app_subscription', [], $fields)
        ]);
        
        return $this->client->request($payload);
    }
}