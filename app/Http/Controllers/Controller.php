<?php

namespace App\Http\Controllers;

use App\Service\ApiService;
use App\Traits\ApiRequester;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ApiRequester;
    public static $TOP_URL= 'https://api.wallx.co/API';

    
}
