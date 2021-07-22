<?php
namespace App\Traits;

use App\Service\ApiService;


trait ApiRequester
{

    /**
     * makeRequest
     *
     * @param  mixed $relativeUrl
     * @param  mixed $method
     * @param  mixed $body
     * @param  mixed $query
     * @return void
     */
    public function makeRequest($relativeUrl, $method, $body, $query=false)
    {
        $service  = new ApiService();
        
        $url = $service->getBaseUri().$relativeUrl;
        

        if ($query) {

            return $service->makeHttpQueryRequest($url, $method, $body)->retrieveResponse();
        }

        return $service->makeHttpNonQueryRequest($url, $method, $body)->retrieveResponse();

    }
}