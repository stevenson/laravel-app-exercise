<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerEntry extends Model
{
    use HasFactory;

    protected $attributes = [
        'price' => 0,
        'type' => 'Application'
    ];
    protected $fillable = [
        'type',
        'quantity',
        'price'
    ];
    private static $cache;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['type'] ?? false) {
            $query->where('type', '=', request(['type']));
        }
    }

    public static function getQueueAndCount()
    {
        $ledger = LedgerEntry::all()
            ->sortBy('bought_at');
        $runningCount = 0;
        $queue = array();
        foreach ($ledger as $entry) {
            if ($entry->type == 'Purchase') {
                $runningCount += $entry->quantity;
                array_push($queue, array(
                    'quantity' => $entry->quantity,
                    'date' => $entry->bought_at,
                    'price' => $entry->price
                ));
            } else {
                $quantity = $entry->quantity;
                $runningCount -= $quantity;
                $appliedRequest = 
                    LedgerEntry::applyRequest($queue, $runningCount, $quantity);
                $queue = $appliedRequest['queue'];
            }
        }
        return [
            'runningCount' => $runningCount,
            'queue' =>  $queue
        ];
    }

    public static function applyRequest($queue, $runningCount, $quantity)
    {
        $fulfilled = array();
        while ($quantity > 0 && count($queue) !== 0) {
            $popped = array_shift($queue);
            if ($popped['quantity'] <= $quantity) {
                $quantity = $quantity - $popped['quantity'];
                array_push($fulfilled, $popped);
            } else {
                $fulfillment = $popped;
                $fulfillment['quantity'] =  $quantity;
                $popped['quantity'] = $popped['quantity'] - $quantity;
                $quantity = 0;
                array_push($fulfilled, $fulfillment);
                array_unshift($queue, $popped);
            }
        }
        return array(
            'queue' => $queue,
            'runningCount' => $runningCount-$quantity,
            'fulfilled' => $fulfilled
        );
    }
}
