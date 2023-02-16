<?php

namespace Onetoweb\Monday;

use DateTime;

/**
 * Utils.
 */
final class Utils
{
    /**
     * @param DateTime $dateTime
     * 
     * @return string
     */
    public static function formatFromDateTime(DateTime $dateTime): string
    {
        return $dateTime->format('Y-m-d\TH:i:s\Z');
    }
    
    /**
     * @param int $timestamp
     * 
     * @return DateTime
     */
    public static function toDateTime(int $timestamp): DateTime
    {
        return (new DateTime())->setTimestamp($timestamp / 10000000);
    }
}