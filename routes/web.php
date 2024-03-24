<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CompanyController;
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

Route::get('/', [SessionController::class, 'index']);

// Register section
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');


// Session section
Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');


// Company section
Route::get('/create-company', [CompanyController::class, 'create'])->middleware('auth');