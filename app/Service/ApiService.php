<?php
namespace App\Service;

use GuzzleHttp\Client;


 class ApiService
 {

    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = $this->getBaseUri();

        $this->client = new Client(
            [
                'verify'=> false,
                'base_uri' => $this->baseUri ,
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token'),
                ]
            ]
        );
    }

    /**
     * Gets the base Uri
     *
     * @return void
     */
    public function getBaseUri()
    {
        return 'https://api.wallx.co/API';
    }

    


     /**
     * makeHttpQueryRequest
     *
     * @param  mixed $url
     * @param  mixed $method
     * @param  mixed $body
     * @return void
     */
    public function makeHttpQueryRequest($url, $method, $body)
    {
        $this->response = $this->client->{strtolower($method)}($url,
                ["query"=>$body]
            );
        
        return $this->retrieveResponse();
    }

    
    /**
     * makeHttpNonQueryRequest
     *
     * @param  mixed $url
     * @param  mixed $method
     * @param  mixed $body
     * @return void
     */
    public function makeHttpNonQueryRequest($url, $method, $body)
    {
        $this->response = $this->client->{strtolower($method)}(
            $url,
            ["form_params"=>$body]
        );

        return $this;
    }


      /**
     * Get the response from paystack
     *
     * @return void
     */
    public function retrieveResponse()
    {
        return json_decode($this->response->getBody(), true);
    }
    
    /**
     * Retrieve data from response
     *
     * @return void
     */
    public function retrieveResponseData()
    {
        return $this->retrieveResponse()['data'];
    }
 }