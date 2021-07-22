<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Exception;

class BillerController extends Controller
{
    public function listBillMerchant()
    {
        try {
            $client = new Client(['verify' => false]);
            $res = $client->request('GET', Controller::$TOP_URL.'/billmerchant', [
                'form_params'=> [],
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token'),
                ],
            ]);
 
            if ($res->getStatusCode() == 200) {
                $response_data = $res->getBody();
                $result = json_decode($response_data,true);
                $billers = $result['data'];
                //dd($billers);
                 return view('billerModule.listBillMerchant')->with('billers', $billers);
            }
        }
        catch (ClientException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            $result = json_decode($responseBody);
           
            return redirect()->route( 'welcome' )->with(['error'=> $result->message]);
        }
    }
}
