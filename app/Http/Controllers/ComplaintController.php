<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Exception;

class ComplaintController extends Controller
{
    public function complaint()
    {
        try {
            $client = new Client(['verify' => false]);
            $res = $client->request('GET', Controller::$TOP_URL.'/complaint', [
                'form_params'=> [],
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token'),
                ],
            ]);
 
            if ($res->getStatusCode() == 200) {
                $response_data = $res->getBody();
                $result = json_decode($response_data,true);
                $complaints = $result['data'];
                
                 return view('complaint.listComplaint')->with('complaints', $complaints);
            }
        }
        catch (ClientException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            $result = json_decode($responseBody);
    
            return redirect()->back()->with(['error'=> $result->message ?? $result->detail]);
        }
    }

    public function update(Request $request)
    {
        try {

            $data = $request->only(['status', 'id']);

            $client = new Client(['verify' => false]);
            $res = $client->request('PUT', Controller::$TOP_URL.'/complaint/', [
                'form_params'=> $data,
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token'),
                ],
            ]);
 
            if ($res->getStatusCode() == 200) {
                $response_data = $res->getBody();
                $result = json_decode($response_data,true);
     
                return redirect()->back()->with(['message'=> $result['maessage']]);
            }
        }
        catch (ClientException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            $result = json_decode($responseBody);
           
            return redirect()->back()->with(['error'=> $result->message]);
        }
    }


}
