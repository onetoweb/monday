<?php

namespace Onetoweb\Monday\Payload;

use Onetoweb\Monday\Utils;
use DateTime;

/**
 * Query Payload.
 */
class Query extends AbstractPayload
{
    /**
     * @var string
     */
    private $name;
    
    /**
     * @var array
     */
    private $arguments;
    
    /**
     * @var array
     */
    private $fields;
    
    /**
     * @param string $name
     * @param array $arguments = []
     * @param array $fields = []
     */
    public function __construct(string $name, array $arguments = [], array $fields = [])
    {
        $this->name = $name;
        $this->arguments = $arguments;
        $this->fields = $fields;
    }
    
    /**
     * {@inheritdoc}
     */
    public function buildPayload(): void
    {
        $this->payload .= $this->name . ' ';
        
        if (count($this->arguments) > 0) {
            
            $this->payload .= '(';
            
            foreach ($this->arguments as $key => $value) {
                
                if ($value instanceof DateTime) {
                    $this->payload .= sprintf('%s: "%s" ', $key, Utils::formatFromDateTime($value));
                } elseif (is_array($value)) {
                    $this->payload .= sprintf('%s: [%s] ', $key, implode(', ', $value));
                } elseif (filter_var($value, FILTER_VALIDATE_INT) === false) {
                    $this->payload .= sprintf('%s: "%s" ', $key, $value);
                } else {
                    $this->payload .= sprintf('%s: %s ', $key, $value);
                }
            }
            
            $this->payload .= ')';
        }
        
        if (count($this->fields) > 0) {
            
            $this->payload .= '{';
            
            foreach ($this->fields as $field) {
                
                if ($field instanceof self) {
                    
                    $this->payload .= (string) $field;
                    
                } else {
                    
                    $this->payload .= $field . ' ';
                    
                }
            }
            
            $this->payload .= '}';
        }
    }
}