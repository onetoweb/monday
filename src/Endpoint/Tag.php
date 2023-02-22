<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Payload;

/**
 * Tag Endpoint.
 */
class Tag extends AbstractEndpoint
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
            new Payload('tags', $arguments, $fields)
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param string $tagName
     * @param int $boardId = null
     *
     * @return array
     */
    public function createOrGet(string $tagName, int $boardId = null): array
    {
        $arguments = [
            'tag_name' => $tagName
        ];
        
        if ($boardId != null) {
            $arguments['board_id'] = $boardId;
        }
        
        $payload = new Payload('mutation', [], [
            new Payload('create_or_get_tag', $arguments, ['id'])
        ]);
        
        return $this->client->request($payload);
    }
}