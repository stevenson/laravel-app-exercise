<?php

namespace App\Http\Controllers;

use App\Models\LedgerEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class WebController extends Controller
{
    public function index(Request $request)
    {
        $heading = 'Ledger Entries';
        return view('ledger.index', [
            'heading' => $heading,
            'ledgerEntries' => LedgerEntry::latest()->filter(request(['type']))->get()
        ]);
    }

    public function show(LedgerEntry $ledgerEntry)
    {
        return view('ledger.show', [
            'ledgerEntry' => $ledgerEntry
        ]);
    }

    public function create()
    {
        [
            'runningCount' => $runningCount,
            'queue' =>  $queue
        ] = LedgerEntry::getQueueAndCount();
        return view('ledger.create', [
            'runningCount' => $runningCount,
            'queue' =>  $queue
        ]);
    }

    public function store(Request $request)
    { // for now we only support apply and not adding

        [
            'runningCount' => $runningCount,
            'queue' =>  $queue
        ] = LedgerEntry::getQueueAndCount();

        $validator = Validator::make($request->all(), [
            'quantity' => "required|numeric|min:1|max:$runningCount",
        ]);
        if ($validator->fails()) {
            return redirect('ledger/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $appliedRequest = LedgerEntry::applyRequest($queue, $runningCount, $request->quantity);
            $ledgerEntry = LedgerEntry::create([
                'quantity' => $request->quantity,
                'bought_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            return redirect('ledger/create')
                ->with([
                    'message' => 'Product Applied',
                    'queue' =>  $queue,
                    'fulfilled' => $appliedRequest['fulfilled'],
                    'runningCount' => $appliedRequest['runningCount']
                ])->withInput();
        }
    }
}
