<?php

namespace Onetoweb\Monday\Payload;

/**
 * Order By.
 */
class OrderBy
{
    /**
     * Direction.
     */
    public const ASC = 'asc';
    public const DESC = 'desc';
    
    /**
     * @var string
     */
    private $columnId;
    
    /**
     * @var string
     */
    private $direction;
    
    /**
     * @param string $columnId
     * @param string $direction = self::ASC
     */
    public function __construct(string $columnId, string $direction = self::ASC)
    {
        $this->columnId = $columnId;
        $this->direction = $direction;
    }
    
    /**
     * @return string
     */
    public function __toString(): string
    {
        return 'order_by: [ { column_id:"'.$this->columnId.'", direction:'.$this->direction.' } ]';
    }
}
