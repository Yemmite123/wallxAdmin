<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Exception;

class ContributionController extends Controller
{
    public function rotationalcontribution()
    {
        try {
            $client = new Client(['verify' => false]);
            $res = $client->request('GET', Controller::$TOP_URL.'/rotationalcontributionmodule', [
                'form_params'=> [],
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token'),
                ],
            ]);
 
            if ($res->getStatusCode() == 200) {
                $response_data = $res->getBody();
                $result = json_decode($response_data,true);
                $contributions = $result['data'];
                //dd($contributions);
                 return view('pages.rotationalContribution')->with('contributions', $contributions);
            }
        }
        catch (ClientException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            $result = json_decode($responseBody);
           
            return redirect()->route( 'welcome' )->with(['error'=> $result->message]);
        }
    }

    public function quickcontribution()
    {
        try {
            $client = new Client(['verify' => false]);
            $res = $client->request('GET', Controller::$TOP_URL.'/quickcontributionmodule', [
                'form_params'=> [],
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token'),
                ],
            ]);
 
            if ($res->getStatusCode() == 200) {
                $response_data = $res->getBody();
                $result = json_decode($response_data,true);
                $contributions = $result['data'];
                //dd($contributions);
                 return view('pages.quickcontribution')->with('contributions', $contributions);
            }
        }
        catch (ClientException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            $result = json_decode($responseBody);
           
            return redirect()->route( 'welcome' )->with(['error'=> $result->message]);
        }
    }


    public function crowdfundingcontribution()
    {
        try {
            $client = new Client(['verify' => false]);
            $res = $client->request('GET', Controller::$TOP_URL.'/crowdcontributionmodule', [
                'form_params'=> [],
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token'),
                ],
            ]);
 
            if ($res->getStatusCode() == 200) {
                $response_data = $res->getBody();
                $result = json_decode($response_data,true);
                $contributions = $result['data'];
                //dd($contributions);
                 return view('pages.crowdfundingcontribution')->with('contributions', $contributions);
            }
        }
        catch (ClientException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            $result = json_decode($responseBody);
           
            return redirect()->route( 'welcome' )->with(['error'=> $result->message]);
        }
    }

}

