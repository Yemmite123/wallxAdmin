<?php

namespace App\Http\Controllers;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;

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
           
            return redirect()->back()->with(['error'=> $result->message]);
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
           
            return redirect()->back()->with(['error'=> $result->message]);
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
           
            $msg = is_null($result) ? 'Unknow Error': $result->message ?? $result->detail;
            return  redirect()->back()->with(['error'=> $msg]);
        }
    }

    public function groupTransactions(Request $request)
    {
        try {

            $url = '/contributiontransactiondetails/';
            $data = ['group_id'=> $request->groupID];
            $transactions = $this->makeRequest($url, 'GET', $data, true)['data']['data'] ?? [];
        
            return view('pages.contributiontransactions')->with(
                ['transactions'=>$transactions]
            );
            
        }
        catch (ClientException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            $result = json_decode($responseBody);
            
            return redirect()->back()->with(['error'=> $result->message ?? $result->detail]);
        }catch(\Exception $e) {
            return redirect()->back()->with(['error'=> $e->getMessage()]);
        }
    }

    public function groupMembers(Request $request)
    {
        try {

            $url = '/contributionmember/';
            $data = ['group_id'=> $request->groupID];
            $members = $this->makeRequest($url, 'GET', $data, true)['data'] ?? [];
        
            return view('pages.contributionmembers')->with(
                ['members'=>$members]
            );
            
        }
        catch (ClientException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            $result = json_decode($responseBody);
            
            return redirect()->back()->with(['error'=> $result->message ?? $result->detail]);
        }catch(\Exception $e) {
            return redirect()->back()->with(['error'=> $e->getMessage()]);
        }
    }

    public function crowdfundingGroupMembers(Request $request)
    {
        try {

            $url = '/crowdfundingcontributionmember';
            $data = ['group_id'=> $request->groupID];
            $members = $this->makeRequest($url, 'GET', $data, true)['data'] ?? [];
        
            return view('pages.contributionmembers')->with(
                ['members'=>$members]
            );
            
        }
        catch (ClientException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            $result = json_decode($responseBody);
            $msg = is_null($result) ? 'Unknow Error': $result->message ?? $result->detail;
            return  redirect()->back()->with(['error'=> $msg]);
        }catch(\Exception $e) {
            return redirect()->back()->with(['error'=> $e->getMessage()]);
        }
    }
    

}

