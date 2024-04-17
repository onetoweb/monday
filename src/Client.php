<?php

namespace Onetoweb\Monday;

use GuzzleHttp\Client as GuzzleCLient;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Psr7\Utils;
use Onetoweb\Monday\Payload\PayloadInterface;
use Onetoweb\Monday\Endpoint\Endpoints;

/**
 * Monday Api Client.
 */
#[\AllowDynamicProperties]
class Client
{
    /**
     * Base Url.
     */
    public const BASE_URL = 'https://api.monday.com/v2';
    public const BASE_FILE_URL = self::BASE_URL . '/file';
    
    /**
     * Methods.
     */
    public const METHOD_POST = 'POST';
    
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
        $this->loadEndpoints();
    }
    
    /**
     * @return void
     */
    private function loadEndpoints(): void
    {
        foreach (Endpoints::list() as $name => $class) {
            $this->{$name} = new $class($this);
        }
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
    
    /**
     * @param string $filepath
     * @param PayloadInterface $payload
     * 
     * @return array
     */
    public function uploadRequest(string $filepath, PayloadInterface $payload): array
    {
        // build options
        $options = [
            RequestOptions::HTTP_ERRORS => false,
            RequestOptions::HEADERS => [
                'Authorization' => $this->apiKey
            ],
            // add multipart content
            RequestOptions::MULTIPART => [
                [
                    'name' => 'query',
                    'contents' => (string) $payload,
                ], [
                    'name' => 'map',
                    'contents' => json_encode([
                        'image' => 'variables.file'
                    ])
                ], [
                    'name' => 'image',
                    'contents' => Utils::tryFopen($filepath, 'r')
                ]
            ],
        ];
        
        // make request
        $response = (new GuzzleCLient())->request(self::METHOD_POST, self::BASE_FILE_URL, $options);
        
        // get contents
        $contents = $response->getBody()->getContents();
        
        // decode json
        $json = json_decode($contents, true);
        
        return $json;
    }
}