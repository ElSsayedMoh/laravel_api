<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\DomainController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//=============================== Auth Module ================================//
Route::controller(AuthController::class)->group(function(){
    Route::post('register' , 'register');
    Route::post('login' , 'login');
    Route::post('logout' , 'logout')->middleware('auth:sanctum');
});

Route::get('/setting' , SettingController::class);     // => The Type is Invokable 

Route::get('/cities' , CityController::class);          // => The Type is Invokable

Route::get('/district' , DistrictController::class);  // => The Type is Invokable

Route::post('/message' , MessageController::class); // => The Type is Invokable

Route::get('/domains' , DomainController::class);