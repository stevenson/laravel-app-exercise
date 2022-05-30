<?php

namespace Tests\Unit;

use App\Models\LedgerEntry;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;



class LedgerEntryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testApplyQueue()
    {
        // given
        $queue = array();
        $runningCount=0;
        array_push($queue, array(
            'quantity' => 10,
            'date' => Carbon::create(2020, 6, 5, 0)->toDateTimeString(),
            'price' => 10
        ));
        $runningCount += 10;
        array_push($queue, array(
            'quantity' => 7,
            'date' => Carbon::create(2020, 6, 15, 0)->toDateTimeString(),
            'price' => 20
        ));
        $runningCount += 7;

        // scenario
        $quantity = 4;
        $appliedRequest = LedgerEntry::applyRequest($queue,$runningCount,$quantity);

        // then
        $this->assertEquals(10, $appliedRequest['fulfilled'][0]['price'], "Actual applied price is wrong.");
        $this->assertEquals(2, count($appliedRequest['queue']), "Actual queue size is not as expected.");
        $this->assertEquals(6, $appliedRequest['queue'][0]['quantity'], "Actual first entry of the queue has the wrong quantity.");

    }
}
