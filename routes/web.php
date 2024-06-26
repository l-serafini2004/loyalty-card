<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\InformationController;

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

// Api guide
Route::get('/documentation', [DocumentationController::class, 'index']);


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

// Left a company
Route::get('/company/left', [CompanyController::class, 'left'])->middleware('connected');
Route::post('/company/left', [CompanyController::class, 'destroy'])->middleware('connected');

// Connect your company
Route::get('/join', [CompanyController::class, 'sign'])->middleware('notconnect')->name('join');
Route::post('/join', [CompanyController::class, 'join'])->middleware('notconnect');

// Section to connected to app
Route::get('/admin', [CompanyController::class, 'admin'])->middleware('connected');
Route::get('/associations/index', [AssociationController::class, 'index'])->middleware('connected');

Route::get('/cards/create', [CardController::class, 'create'])->middleware('connected');
Route::post('/cards/create', [CardController::class, 'store'])->middleware('connected');
Route::get('/cards/update', [CardController::class, 'modify'])->middleware('connected');
Route::post('/cards/delete', [CardController::class, 'delete'])->middleware('connected');
Route::get('/card/update/{card:id}', [CardController::class, 'showUpdate'])->middleware('connected');
Route::post('/card/update', [CardController::class, 'update'])->middleware('connected');

// Change company plan
Route::get('/company/updateplan', [CompanyController::class, 'updatePlan'])->middleware('connected');
Route::post('/company/updateplan', [CompanyController::class, 'storePlan'])->middleware('connected');

// Create customer
Route::get('/users/create', [CustomerController::class, 'create'])->middleware('connected');
Route::post('/users/create', [CustomerController::class, 'store'])->middleware('connected');

// Add user --> card
Route::get('/users/update', [CustomerController::class, 'modify'])->middleware('connected');
Route::post('/users/update', [CustomerController::class, 'update'])->middleware('connected');

// Modify user card
Route::get('/associations/index/{association:card_number}', [AssociationController::class, 'show'])->middleware('connected');
Route::post('/associations/update', [AssociationController::class, 'update'])->middleware('connected');
Route::post('/associations/delete', [AssociationController::class, 'destroy'])->middleware('connected');

// Documentation sections
Route::get('/documentation/api', [DocumentationController::class, 'api'])->middleware('connected');

// ONLY CUSTOMERS PART
Route::get('/mycards', [CustomerController::class, 'index']);

// INFO PART
Route::get('/information', [InformationController::class, 'index']);
