<?php

namespace Onetoweb\Monday\Payload;

/**
 * Mutation Payload.
 */
class Mutation extends AbstractPayload
{
    /**
     * @var string
     */
    private $action;
    
    /**
     * @var array
     */
    private $fields;
    
    /**
     * @var array
     */
    private $selection;
    
    /**
     * @param string $action = ''
     * @param array $selection = []
     * @param array $fields = []
     */
    public function __construct(string $action, array $fields = [], array $selection = [])
    {
        $this->action = $action;
        $this->fields = $fields;
        $this->selection = $selection;
    }
    
    /**
     * {@inheritdoc}
     */
    public function buildPayload() : void
    {
        $this->payload .= sprintf('mutation {%s ', $this->action);
        
        if (count($this->fields) > 0) {
            
            $this->payload .= '( ';
            
            $i = 0;
            foreach ($this->fields as $fieldName => $value) {
                
                if (is_array($value) and array_is_list($value)) {
                    $this->payload .= sprintf('%s: [%s] ', $fieldName, implode(', ', $value));
                } elseif (is_array($value)) {
                    $this->payload .= sprintf('%s: "%s" ', $fieldName, addslashes(json_encode($value)));
                } elseif (str_contains($value, ' ')) {
                    $this->payload .= sprintf('%s: "%s"', $fieldName, $value);
                } else {
                    $this->payload .= sprintf('%s: %s', $fieldName, $value);
                }
                
                $i++;
                if ($i < count($this->fields)) {
                    $this->payload .= ', ';
                }
            }
            
            $this->payload .= ' )';
        }
       
        if (count($this->selection) > 0) {
            $this->payload .= sprintf('{%s} ', implode(', ', $this->selection));
        }
        
        $this->payload .= ' }';
    }
}