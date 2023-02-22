<?php

namespace Onetoweb\Monday\Payload;

use Onetoweb\Monday\Utils;
use DateTime;

/**
 * Payload.
 */
class Payload implements PayloadInterface
{
    /**
     * @var string
     */
    protected $name;
    
    /**
     * @var array
     */
    protected $arguments;
    
    /**
     * @var array
     */
    protected $items;
    
    /**
     * @var string
     */
    private $payload;
    
    /**
     * @param string $name
     * @param array $arguments = []
     * @param array array $items = []
     */
    public function __construct(string $name, array $arguments = [], array $items = [])
    {
        $this->name = $name;
        $this->arguments = $arguments;
        $this->items = $items;
    }
    
    /**
     * {@inheritdoc}
     */
    private function buildPayload(): void
    {
        $this->payload .= $this->name . ' ';
        
        // add arguments to payload
        if (count($this->arguments) > 0) {
            
            $this->payload .= '(';
            
            $i = 0;
            foreach ($this->arguments as $key => $value) {
                
                // format value and add argument to payload
                if (is_array($value) and array_is_list($value)) {
                    $this->payload .= sprintf('%s: [%s]', $key, implode(', ', $value));
                } elseif (is_array($value)) {
                    $this->payload .= sprintf('%s: "%s"', $key, addslashes(json_encode($value)));
                } elseif ($value instanceof DateTime) {
                    $this->payload .= sprintf('%s: "%s"', $key, Utils::formatFromDateTime($value));
                } elseif (filter_var($value, FILTER_VALIDATE_INT) or !str_contains($value, ' ')) {
                    $this->payload .= sprintf('%s: %s', $key, $value);
                } else {
                    $this->payload .= sprintf('%s: "%s" ', $key, $value);
                }
                
                $i++;
                if ($i < count($this->arguments)) {
                    $this->payload .= ', ';
                }
            }
            
            $this->payload .= ')';
        }
        
        // add items to payload
        if (count($this->items) > 0) {
            
            $this->payload .= '{';
            
            $j = 0;
            foreach ($this->items as $item) {
                
                // add item to payload
                if ($item instanceof PayloadInterface) {
                    $this->payload .= (string) $item;
                } else {
                    $this->payload .= $item;
                }
                
                $j++;
                if ($j < count($this->items)) {
                    $this->payload .= ', ';
                }
            }
            
            $this->payload .= '}';
        }
    }
    
    /**
     * @return string
     */
    public function __toString(): string
    {
        $this->buildPayload();
        
        return $this->payload;
    }
}