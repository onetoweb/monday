<?php

namespace Onetoweb\Monday\Endpoint\Endpoints;

use Onetoweb\Monday\Endpoint\AbstractEndpoint;
use Onetoweb\Monday\Payload\Payload;

/**
 * Subitem Endpoint.
 */
class Subitem extends AbstractEndpoint
{
    /**
     * @param array $fields = []
     * @param array $boardArguments = []
     * @param array $itemArguments = []
     * 
     * @return array
     */
    public function read(array $fields = [], array $boardArguments = [], array $itemArguments = []): array
    {
        $payload = new Payload('query', [], [
            new Payload('boards', $boardArguments, [
                new Payload('items', $itemArguments, [
                    new Payload('subitems ', [], $fields)
                ])
            ])
        ]);
        
        return $this->client->request($payload);
    }
    
    /**
     * @param int $parentItemId
     * @param string $name
     * @param array $values = null
     * @param bool $createLabels = true
     * 
     * @return array
     */
    public function create(int $parentItemId, string $name, array $values = null, bool $createLabels = true): array
    {
        $data = [
            'item_name' => $name,
            'parent_item_id' => $parentItemId,
        ];
        
        if ($values !== null) {
            $data['column_values'] = $values;
            $data['create_labels_if_missing'] = $createLabels;
        }
        
        $payload = new Payload('mutation', [], [
            new Payload('create_subitem', $data, [
                'id'
            ])
        ]);
        
        return $this->client->request($payload);
    }
}