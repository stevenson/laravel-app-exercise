<?php

namespace App\Http\Controllers;

use App\Models\LedgerEntry;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(Request $request){
        $heading = 'Ledger Entries';
        return view('ledger_entries.index', [
            'heading' => $heading,
            'ledgerEntries' => LedgerEntry::latest()->filter(request(['type']))->get()
        ]);
    }

    public function show(LedgerEntry $ledgerEntry){
        return view('ledger_entries.show', [
            'ledgerEntry' => $ledgerEntry
        ]);

    }

    public function create(){
        return view('ledger_entries.create');
    }
}
