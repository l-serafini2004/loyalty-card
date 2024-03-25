<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CardController;
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
Route::get('login', [SessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');


// Company section
Route::get('/create-company', [CompanyController::class, 'create'])->middleware('notconnect');
Route::post('/create-company', [CompanyController::class, 'store'])->middleware('notconnect');


// Connect your company
Route::get('/join', [CompanyController::class, 'sign'])->middleware('notconnect');
Route::post('/join', [CompanyController::class, 'join'])->middleware('notconnect');

// Section to connected to app
Route::get('/admin', [CompanyController::class, 'admin'])->middleware('connected');
Route::get('/cards', [CardController::class, 'show'])->middleware('connected');
