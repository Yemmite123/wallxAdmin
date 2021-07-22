<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Example Routes
Route::view('/', 'landing');
Route::match(['get', 'post'], '/dashboard', function(){
    return view('dashboard');
});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');


Route::get('/admin', [App\Http\Controllers\AdminManagementController::class, 'index']);
Route::post('/create_admin', [App\Http\Controllers\AdminManagementController::class, 'store']);
Route::get('/admin_profile', [App\Http\Controllers\AdminManagementController::class, 'profile']);
Route::post('/admin_login', [App\Http\Controllers\AdminManagementController::class, 'doLogin']);
Route::post('/update_admin', [App\Http\Controllers\AdminManagementController::class, 'update']);
Route::post('/change_admin_password', [App\Http\Controllers\AdminManagementController::class, 'changePassword']);


//Contribution

Route::get('/pages/rotationalcontribution', [App\Http\Controllers\ContributionController::class, 'rotationalcontribution']);
Route::get('/pages/quickcontribution', [App\Http\Controllers\ContributionController::class, 'quickcontribution']);
Route::get('/pages/crowdfundingcontribution', [App\Http\Controllers\ContributionController::class, 'crowdfundingcontribution']);

//listmerchant
Route::get('/pages/listmerchant', [App\Http\Controllers\MerchantController::class, 'listmerchant']);


//App User
Route::get('/appUser/listUser', [App\Http\Controllers\AppUserController::class, 'appUser']);


//billmerchant 
Route::get('/billerModule/listBillMerchant', [App\Http\Controllers\BillerController::class, 'listBillMerchant']);

//complaint/listComplaint

Route::get('/complaint/listComplaint', [App\Http\Controllers\ComplaintController::class, 'complaint']);