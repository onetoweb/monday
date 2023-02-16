<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\{Query, Mutation};

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
        $query = new Query('query', [], [
            new Query('tags', $arguments, $fields)
        ]);
        
        return $this->client->request($query);
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
        
        $mutation = new Mutation('create_or_get_tag', $arguments, ['id']);
        
        return $this->client->request($mutation);
    }
}