<?php

namespace Onetoweb\Monday\Payload;

use Stringable;

/**
 * Payload Interface.
 */
interface PayloadInterface extends Stringable
{
    /**
     * @return void
     */
    public function buildPayload(): void;
}