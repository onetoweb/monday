<?php

namespace Onetoweb\Monday\Endpoint;

use Onetoweb\Monday\Payload\Payload;

/**
 * File Endpoint.
 */
class File extends AbstractEndpoint
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
            new Payload('assets', $arguments, $fields)
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param string $filepath
     * @param int $updateId
     * 
     * @return array
     */
    public function addToUpdate(string $filepath, int $updateId): array
    {
        // build payload
        $payload = new Payload('mutation', ['$file' => 'File!'], [
            new Payload('add_file_to_update', [
                'file' => '$file',
                'update_id' => $updateId
            ], ['id'])
        ]);
        
        return $this->client->uploadRequest($filepath, $payload);
    }
    
    /**
     * @param string $filepath
     * @param int $itemId
     * @param string $columnId
     *
     * @return array
     */
    public function addToColumn(string $filepath, int $itemId, string $columnId): array
    {
        // build payload
        $payload = new Payload('mutation', ['$file' => 'File!'], [
            new Payload('add_file_to_column', [
                'file' => '$file',
                'item_id' => $itemId,
                'column_id' => $columnId
            ], ['id'])
        ]);
        
        return $this->client->uploadRequest($filepath, $payload);
    }
}