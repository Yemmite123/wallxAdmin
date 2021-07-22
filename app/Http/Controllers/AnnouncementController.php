<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ClientException;

class AnnouncementController extends Controller
{
        
    /**
     * Index of announcements
     *
     * @return \Illuminate\Support\Facade\View
     */
    public function index()
    { 
        try {
           
            $announcements = $this->makeRequest('/announcement', 'GET', [])['data'] ?? [];
            $merchants = $this->makeRequest('/listmerchant', 'GET', [])['data'] ?? [];
            $users = $this->makeRequest('/listadminuser', 'GET', [])['data'] ?? [];
           
            return view('adminManagemt.announcement')->with(
                ['announcements'=>$announcements, 'merchants'=>$merchants, 'users'=>$users]
            );
            
        }
        catch (ClientException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            $result = json_decode($responseBody);
    
            return redirect()->back()->with(['error'=> $result->message ?? $result->detail]);
        }
    }
    
    /**
     * Stores tha announcement
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    { 
        try {

            $data = $request->only(['title', 'body', 'merchantID', 'userID']);
            // I noticed if i dont add this slash it 
            $response = $this->makeRequest('/announcement/', 'POST', $data);

            return redirect()->back()->with(['message'=> $response['message']]);
        }
        catch (ClientException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            $result = json_decode($responseBody);
            return redirect()->route('welcome')->with(['error'=> $result->message]);
        }
    }
}
