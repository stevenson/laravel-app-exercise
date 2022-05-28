<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplyRequest;
use App\Models\LedgerEntry;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ApplyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplyRequest $request)
    {   
        $runningCount = $request->cache['runningCount'];
        $queue = $request->cache['queue'];
        $appliedRequest = LedgerEntry::applyRequest($queue, $runningCount, $request->quantity);
        $ledgerEntry = LedgerEntry::create([
            'quantity' => $request->quantity,
            'bought_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        // TODO: store queue and running count in cache
        return response()->json([
            'application' => collect($ledgerEntry->toArray())
                ->only(['quantity', 'type', 'bought_at'])
                ->all(),
            'rates' => $appliedRequest['fulfilled'],
            'runningCount' => $appliedRequest['runningCount']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
