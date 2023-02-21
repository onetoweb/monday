<?php

namespace Onetoweb\Monday;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Webhook Helper class.
 */
final class Webhook
{
    public static function acknowledge()
    {
        $request = Request::createFromGlobals();
        
        $data = json_decode($request->getContent(), true);
        
        if (isset($data['challenge'])) {
            
            // acknowledge challenge
            $response = new JsonResponse($data);
            $response->send();
        }
    }
}