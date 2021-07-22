<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Exception;
class AdminManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { //session('token')
        try {
            $client = new Client(['verify' => false]);
            // $response = Http::withToken('token')->post(...);
            $res = $client->request('GET', Controller::$TOP_URL.'/listadminuser', [
                //  'form_params'=> [],
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token'),
                ],
            ]);
 
            if ($res->getStatusCode() == 200) {
                $response_data = $res->getBody();
                $result = json_decode($response_data,true);
                $users = $result['data'];
                //dd($users);
                 return view('adminManagemt.index')->with('users', $users);
            }
        }
        catch (ClientException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            $result = json_decode($responseBody);
           ///dd( $result );
            return redirect()->route('welcome')->with(['error'=> $result->message]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request['adminfirstname']);
        try {
            $client = new Client(['verify' => false]);
            $res = $client->request('POST', Controller::$TOP_URL.'/adminuser/', [
                'form_params'=> [
                    'adminfirstname' => $request->get('adminfirstname'),
                    'adminlastname' => $request->get('adminlastname'),
                    'adminemailaddress' => $request->get('adminemailaddress'),
                    'adminphonenumber' => $request->get('adminphonenumber'),
                    'admingender' => $request->get('admingender'),
                    'admindob' => $request->get('admindob'),
                    'adminusername' => $request->get('adminusername'),
                    'adminpassword' => $request->get('adminpassword'),
                    'adminrole' => 'admin',
                    'adminprofilelink' => '',
                ],
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token'),
                ],
            ]);
 
            if ($res->getStatusCode() == 200) {
                $response_data = $res->getBody();
                $result = json_decode($response_data,true);
                 return redirect()->back()->with(['message'=> $result['message']]);
            }
        }
        catch (ClientException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            $result = json_decode($responseBody);
           //dd($result);
            return redirect()->back()->with(['error'=> $result->adminusername[0]]);
        }
        catch(RequestException $re){
            $status = 'false';
            $message = $re->getMessage();
            $data = [];
         }catch(Exception $e){
            $this->status = 'false';
            $this->message = $e->getMessage();
            $data = [];
         }

    }

    public function doLogin(Request $request)
    {
        //dd($request->get('password'));
        
        try {
            $client = new Client(['verify' => false]);
            $res = $client->request('GET', Controller::$TOP_URL.'/adminlogin/?username='.$request->get('username').'&password='.$request->get('password').'', [
                'form_params'=> []
            ]);
 
            if ($res->getStatusCode() == 200) {
                $response_data = $res->getBody();
                $result = json_decode($response_data,true);
              //dd($result['token']);
               if ($result['status'] == true) {
                    session([
                        'token' => $result['token'],
                        'id' => $result['data']['id'],
                        'adminusername' => $result['data']['adminusername'],
                        'adminfirstname' =>$result['data']['adminfirstname'],
                        'adminlastname' => $result['data']['adminlastname'],
                        'adminprofilelink' => $result['data']['adminprofilelink'],
                        'adminrole' => $result['data']['adminrole'],
                        'adminemailaddress' => $result['data']['adminemailaddress'],
                        'adminphonenumber' => $result['data']['adminphonenumber'],
                        'admindob' => $result['data']['admindob'],
                        'admingender' => $result['data']['admingender'],
                    ]);
                        //dd(session('token'));
                       return redirect()->to('dashboard');
               } 
               else {
                      return redirect()->back()->with(['error'=> $result['message']]);
               }
               
              
                
                
            }
        }
        catch (ClientException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            $result = json_decode($responseBody);
           //dd($result);
            return redirect()->route( 'welcome' )->with(['error'=> $result->message]);
        }
    
    }
    
    public function profile()
    {
        return view('adminManagemt.editAdminProfile');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        try {
           
            $data = [
                'adminfirstname' => $request->get('adminfirstname'),
                'adminlastname' => $request->get('adminlastname'),
                'admingender' => $request->get('admingender'),
                'id' => $request->get('adminid'),
            ];

            //if the user uploaded a file in the profile image add that to request data to be sent
            if ($request->file('adminprofilelink')) {
                $data['adminprofilelink'] = $request->file('adminprofilelink');
            }

            $client = new Client(['verify' => false]);
            $res = $client->request('PUT', Controller::$TOP_URL.'/adminuser/', [
                'form_params'=> $data,
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token'),
                ],
            ]);
 
            if ($res->getStatusCode() == 200) {
                $response_data = $res->getBody();
               
                $result = json_decode($response_data,true);
                

                // If the user is the loggedIn user then update with new updates
                if ($result['status'] == true && $result['data']['id'] == session('id')) {
                    session([
                        'id' => $result['data']['id'],
                        'adminusername' => $result['data']['adminusername'],
                        'adminfirstname' =>$result['data']['adminfirstname'],
                        'adminlastname' => $result['data']['adminlastname'],
                        'adminprofilelink' => $result['data']['adminprofilelink'],
                        'adminrole' => $result['data']['adminrole'],
                        'adminemailaddress' => $result['data']['adminemailaddress'],
                        'adminphonenumber' => $result['data']['adminphonenumber'],
                        // 'admindob' => $result['data']['admindob'],
                        'admingender' => $result['data']['admingender'],
                    ]);
                }
                
                 return redirect()->back()->with(['message'=> $result['message']]);
            }
            return redirect()->back()->with(['error'=> 'Request was not successful an unknown error occured']);
        }
        catch (ClientException $e) {
            if($e->getResponse()->getStatusCode() == 400)
            $responseBody = $e->getResponse()->getBody()->getContents();
            $result = json_decode($responseBody);
            return redirect()->back()->with(['error'=> $result->adminusername[0]]);
        }
        catch(RequestException $re){
            $status = 'false';
            $message = $re->getMessage();
            $data = [];
            return redirect()->back()->with(['error'=> $re->getMessage()]);
         }catch(Exception $e){
            $this->status = 'false';
            $this->message = $e->getMessage();
            $data = [];
            return redirect()->back()->with(['error'=> $e->getMessage()]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function changePassword(Request $request)
    {
        //dd($request->all());
        try {
            $client = new Client(['verify' => false]);
            $res = $client->request('POST', Controller::$TOP_URL.'/adminchangepassword/', [
                'form_params'=> [
                    'oldpassword' => $request->get('oldpassword'),
                    'newpassword' => $request->get('newpassword'),
                    'id' => session('id'),
                ],
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . session('token'),
                ],
            ]);
 
            if ($res->getStatusCode() == 200) {
                $response_data = $res->getBody();
                $result = json_decode($response_data,true);
                 return redirect()->back()->with(['message'=> $result['message']]);
            }
        }
        catch (ClientException $e) {
            if($e->getResponse()->getStatusCode() == 400)
            $responseBody = $e->getResponse()->getBody()->getContents();
            $result = json_decode($responseBody);
            return redirect()->back()->with(['error'=> $result]);
        }
        catch(RequestException $re){
            $status = 'false';
            $message = $re->getMessage();
            $data = [];
         }catch(Exception $e){
            $this->status = 'false';
            $this->message = $e->getMessage();
            $data = [];
         }

    }


}
