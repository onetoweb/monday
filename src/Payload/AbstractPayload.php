<?php

namespace Onetoweb\Monday\Payload;

/**
 * Abstract Payload.
 */
abstract class AbstractPayload implements PayloadInterface
{
    /**
     * @var string
     */
    protected $payload = '';
    
    /**
     * @return string
     */
    public function __toString(): string
    {
        $this->buildPayload();
        
        return $this->payload;
    }
}