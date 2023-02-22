<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Payload;

/**
 * Document Block Endpoint.
 */
class DocumentBlock extends AbstractEndpoint
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
            new Payload('docs', $arguments, [
                new Payload('blocks', [], $fields)
            ])
        ]);
        
        return $this->client->request($payload);
    }
}