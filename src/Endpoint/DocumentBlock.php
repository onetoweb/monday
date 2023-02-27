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
    
    /**
     * @param int $documentId
     * @param string $type
     * @param array $content
     * @param string $afterBlockId = null
     * 
     * @return array
     */
    public function create(int $documentId, string $type, array $content, string $afterBlockId = null): array
    {
        $data = [
            'doc_id' => $documentId,
            'type' => $type,
            'content' => $content
        ];
        
        if ($afterBlockId !== null) {
            $data['after_block_id'] = $afterBlockId;
        }
        
        $payload = new Payload('mutation', [], [
            new Payload('create_doc_block', $data, [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param string $blockId
     * @param array $content
     * 
     * @return array
     */
    public function update(string $blockId, array $content): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('update_doc_block', [
                'block_id' => $blockId,
                'content' => $content
            ], [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param string $blockId
     * 
     * @return array
     */
    public function delete(string $blockId): array
    {
        $payload = new Payload('mutation', [], [
            new Payload('delete_doc_block', [
                'block_id' => $blockId,
            ], [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
}