<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Exception;

class MerchantController extends Controller
{
    public function listmerchant()
    {
        try {
            $client = new Client(['verify' => false]);
            $res = $client->request('GET', Controller::$TOP_URL.'/listmerchant/', [
                'form_params'=> [],
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token'),
                ],
            ]);
 
            if ($res->getStatusCode() == 200) {
                $response_data = $res->getBody();
                $result = json_decode($response_data,true);
                $listmerchant = $result['data'];
                //dd($listmerchant);
                 return view('pages.listmerchant')->with('listmerchant', $listmerchant);
            }
        }
        catch (ClientException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            $result = json_decode($responseBody);
    
            return redirect()->back()->with(['error'=> $result->message ?? $result->detail]);
        }
    }
}
