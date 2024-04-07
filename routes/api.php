<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// All the APIs controllers
use App\Http\Controllers\CompanyControllerAPI;
use App\Http\Controllers\SessionControllerAPI;
use App\Http\Controllers\CardControllerAPI;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Login - non devi essere già loggato
Route::post('/authenticate', [SessionControllerAPI::class, 'store']);


Route::group(['middleware' => ['auth:sanctum']], function (){

    // Get the company info
    Route::get('/company/info', [CompanyControllerAPI::class, 'index']);

    // Get all the cards
    Route::get('/card/all', [CardControllerAPI::class, 'index']);

    // Get the cards with a specific name
    Route::get('/card/show', [CardControllerAPI::class, 'show']);

    //

});

