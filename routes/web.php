<?php

use App\Http\Controllers\WebController;
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

// Store listings
Route::get('/', [WebController::class, 'create']); // just so we have a base page
Route::get('/ledger/create', [WebController::class, 'create']); 
    // NOTE: we are just using the create as the default because our app just applies product requests
    // see readme
Route::post('/ledger/store', [WebController::class, 'store']);

// all listings
Route::get('/ledger', [WebController::class, 'index']);

// single listing - needs to be at the end because the last part of the slash will eat things ledger/create
Route::get('/ledger/{ledgerEntry}', [WebController::class, 'show']);

