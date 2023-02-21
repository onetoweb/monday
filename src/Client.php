<?php

namespace Onetoweb\Monday;

use GuzzleHttp\RequestOptions;
use GuzzleHttp\Client as GuzzleCLient;
use Onetoweb\Monday\Payload\PayloadInterface;
use Onetoweb\Monday\Endpoint;

/**
 * Monday Api Client.
 */
class Client
{
    /**
     * Base Url.
     */
    const BASE_URL = 'https://api.monday.com/v2';
    
    /**
     * Methods.
     */
    const METHOD_POST = 'POST';
    
    /**
     * @var string
     */
    private $apiKey;
    
    /**
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        
        // load endpoints
        $this->loadEnpoints();
    }
    
    /**
     * @return void
     */
    private function loadEnpoints(): void
    {
        $this->account = new Endpoint\Account($this);
        $this->activityLog = new Endpoint\ActivityLog($this);
        $this->appSubscription = new Endpoint\AppSubscription($this);
        $this->board = new Endpoint\Board($this);
        $this->boardView = new Endpoint\BoardView($this);
        $this->column = new Endpoint\Column($this);
        $this->columnValue = new Endpoint\ColumnValue($this);
        $this->complexity = new Endpoint\Complexity($this);
        $this->document = new Endpoint\Document($this);
        $this->documentBlock = new Endpoint\DocumentBlock($this);
        $this->file = new Endpoint\File($this);
        $this->group = new Endpoint\Group($this);
        $this->item = new Endpoint\Item($this);
        $this->me = new Endpoint\Me($this);
        $this->notification = new Endpoint\Notification($this);
        $this->plan = new Endpoint\Plan($this);
        $this->subitem = new Endpoint\Subitem($this);
        $this->tag = new Endpoint\Tag($this);
        $this->team = new Endpoint\Team($this);
        $this->update = new Endpoint\Update($this);
        $this->user = new Endpoint\User($this);
        $this->webhook = new Endpoint\Webhook($this);
        $this->workspace = new Endpoint\Workspace($this);
    }
    
    /**
     * @param PayloadInterface $payload
     * 
     * @return array
     */
    public function request(PayloadInterface $payload): array
    {
        // build options
        $options = [
            RequestOptions::HTTP_ERRORS => false,
            RequestOptions::HEADERS => [
                'Content-Type' => 'application/json',
                'Authorization' => $this->apiKey
            ],
            // add json payload
            RequestOptions::JSON => [
                'query' => (string) $payload
            ]
        ];
        
        // make request
        $response = (new GuzzleCLient())->request(self::METHOD_POST, self::BASE_URL, $options);
        
        // get contents
        $contents = $response->getBody()->getContents();
        
        // decode json 
        $json = json_decode($contents, true);
        
        return $json;
    }
}