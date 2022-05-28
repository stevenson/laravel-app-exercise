<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LedgerEntry;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductApplicationController extends Controller
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
        dd('akbar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ledger = LedgerEntry::all()
            ->sortBy("bought_at");
        $runningCount = 0;
        $queue = array();
        foreach ($ledger as $entry) {
            if ($entry->type == 'Purchase') {
                $runningCount += $entry->quantity;
                array_push($queue, array(
                    "quantity" => $entry->quantity,
                    "date" => $entry->bought_at,
                    "price" => $entry->price
                ));
            } else {
                $quantity = $entry->quantity;
                $runningCount -= $quantity;
                $appliedRequest = $this::applyRequest($queue, $quantity);
                $queue = $appliedRequest["queue"];
            }
        }
        $appliedRequest = $this::applyRequest($queue, $request->quantity);
        // dd(array(
        //     "runningCount" => $runningCount,
        //     "applied" => $appliedRequest["fulfilled"],
        //     "queue" => $appliedRequest["queue"]
        // ));
        // dd($queue);
        // var_dump('<br/>');
        // dd('wait');
        $ledgerEntry = LedgerEntry::create([
            "quantity" => $request->quantity,
            "bought_at" => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        return response()->json([
            "runningCount" => $runningCount,
            "application" => collect($ledgerEntry->toArray())
                ->only(['quantity', 'type', 'bought_at'])
                ->all(),
            "rates" => $appliedRequest["fulfilled"]
        ]);
    }

    private static function applyRequest($queue, $quantity)
    {
        $fulfilled = array();
        while ($quantity > 0 && count($queue) !== 0) {
            $popped = array_shift($queue);
            if ($popped["quantity"] <= $quantity) {
                $quantity = $quantity - $popped['quantity'];
                array_push($fulfilled, $popped);
            } else {
                $fulfillment = $popped;
                $fulfillment["quantity"] =  $quantity;
                $popped["quantity"] = $popped["quantity"] - $quantity;
                $quantity = 0;
                array_push($fulfilled, $fulfillment);
                array_unshift($queue, $popped);
            }
        }
        return array(
            "queue" => $queue,
            "fulfilled" => $fulfilled
        );
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
