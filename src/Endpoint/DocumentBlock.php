<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Query;

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
        $query = new Query('query', [], [
            new Query('docs', $arguments, [
                new Query('blocks', [], $fields)
            ])
        ]);
        
        return $this->client->request($query);
    }
}