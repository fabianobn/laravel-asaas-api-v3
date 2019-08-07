<?php

namespace Asaas\Api;

use GuzzleHttp\Client;

class Connection {
    
    public $http;
    public $api_key;
    public $base_url;
    public $headers;
    
    public function __construct() {
        $this->api_token = config('asaas.api_key');
        $this->base_url = config('asaas.base_url');
        $this->headers = [
            'access_token' => config('asaas.api_key'),        
            'Accept'        => 'application/json',
        ];
        $this->http = new Client(['headers' => $this->headers]);
        
        return $this->http;
    }

    public function get($url)
    {
        try
        {
            $response = $this->http->request('GET', $this->base_url . $url);
        }
        catch(RequestException $e)
        {
            $response = $e->getResponse();
            $this->handleError();
        }
        return $response->getBody(true);
    }
    
    public function post($url, $params)
    {
        // Faz a requisição
        $response = $this->http->request('POST', $this->base_url . $url, $params);
        // Retorna a resposta
        return [
            'code'     => $response->getStatusCode(),
            'response' => $response->getBody()
        ];
    }
    
}