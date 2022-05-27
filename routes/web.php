<?php

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
// all listings
Route::get('/ledger', function () {
    $heading = 'Ledger Entries';
    return view('ledger_entries', [
        'heading' => $heading,
        'ledgerEntries' => LedgerEntry::all()
    ]);
});

Route::get('/ledger/{id}', function ($id) {
    $heading = 'Ledger Entry';
    return view('ledger_entry', [
        'heading' => $heading,
        'ledgerEntry' => LedgerEntry::find($id)
    ]);
});

Route::get('/search', function () {
    return view('products');
});
