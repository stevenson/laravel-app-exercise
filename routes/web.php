<?php

use App\Http\Controllers\WebController;
use App\Models\LedgerEntry;
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

// all listings
Route::get('/ledger', [WebController::class, 'index']);

// single listing
Route::get('/ledger/{ledgerEntry}', [WebController::class, 'show']);

