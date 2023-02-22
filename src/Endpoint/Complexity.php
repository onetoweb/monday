<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\{Payload, PayloadInterface};

/**
 * Complexity Endpoint.
 */
class Complexity extends AbstractEndpoint
{
    /**
     * @param array $fields
     * @param PayloadInterface $payload
     * 
     * @return array
     */
    public function test(array $fields, PayloadInterface $testPayload): array
    {
        $payload = new Payload('query', [], [
            new Payload('complexity', [], $fields),
            $testPayload
        ]);
        
        return $this->client->request($payload);
    }
}