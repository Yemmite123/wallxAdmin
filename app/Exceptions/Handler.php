<?php

namespace App\Exceptions;

use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (ServerException $e, $request) {
            return redirect()->back()->with(['error'=> 'Network error occurred']);
        });
        $this->renderable(function (ConnectException $e, $request) {
            return redirect()->back()->with(['error'=> 'Network error occurred']);
        });
    }
}
