<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\LedgerEntry;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    protected $toTruncate = ['ledger_entries'];


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Model::unguard();
        Schema::disableForeignKeyConstraints();
        foreach ($this->toTruncate as $table) {
            DB::table($table)->truncate();
        }
        Schema::enableForeignKeyConstraints();
        $this->call(LedgerEntryTableSeeder::class);

        Model::reguard();
    }
}

class LedgerEntryTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('ledger_entries')->truncate();



        $ledgerEntries = [
            [
                'bought_at' => Carbon::create(2020, 6, 5, 0)->toDateTimeString(),
                'type' => 'Purchase',
                'quantity' => 10,
                'price' => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'bought_at' => Carbon::create(2020, 6, 7, 0)->toDateTimeString(),
                'type' => 'Purchase',
                'quantity' => 30,
                'price' => 4.5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'bought_at' => Carbon::create(2020, 6, 8, 0)->toDateTimeString(),
                'type' => 'Application',
                'quantity' => 20,
                'price' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'bought_at' => Carbon::create(2020, 6, 9, 0)->toDateTimeString(),
                'type' => 'Purchase',
                'quantity' => 10,
                'price' => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'bought_at' => Carbon::create(2020, 6, 10, 0)->toDateTimeString(),
                'type' => 'Purchase',
                'quantity' => 34,
                'price' => 4.5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'bought_at' => Carbon::create(2020, 6, 15, 0)->toDateTimeString(),
                'type' => 'Application',
                'quantity' => 25,
                'price' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'bought_at' => Carbon::create(2020, 6, 23, 0)->toDateTimeString(),
                'type' => 'Application',
                'quantity' => 37,
                'price' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'bought_at' => Carbon::create(2020, 7, 10, 0)->toDateTimeString(),
                'type' => 'Purchase',
                'quantity' => 47,
                'price' => 4.3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'bought_at' => Carbon::create(2020, 7, 12, 0)->toDateTimeString(),
                'type' => 'Application',
                'quantity' => 38,
                'price' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'bought_at' => Carbon::create(2020, 7, 13, 0)->toDateTimeString(),
                'type' => 'Purchase',
                'quantity' => 10,
                'price' => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'bought_at' => Carbon::create(2020, 7, 25, 0)->toDateTimeString(),
                'type' => 'Purchase',
                'quantity' => 50,
                'price' => 4.2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'bought_at' => Carbon::create(2020, 7, 26, 0)->toDateTimeString(),
                'type' => 'Application',
                'quantity' => 28,
                'price' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'bought_at' => Carbon::create(2020, 7, 31, 0)->toDateTimeString(),
                'type' => 'Purchase',
                'quantity' => 10,
                'price' => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'bought_at' => Carbon::create(2020, 8, 14, 0)->toDateTimeString(),
                'type' => 'Purchase',
                'quantity' => 15,
                'price' => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'bought_at' => Carbon::create(2020, 8, 17, 0)->toDateTimeString(),
                'type' => 'Purchase',
                'quantity' => 3,
                'price' => 6,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'bought_at' => Carbon::create(2020, 8, 29, 0)->toDateTimeString(),
                'type' => 'Purchase',
                'quantity' => 2,
                'price' => 7,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'bought_at' => Carbon::create(2020, 8, 31, 0)->toDateTimeString(),
                'type' => 'Application',
                'quantity' => 30,
                'price' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];
        foreach ($ledgerEntries as $ledgerEntry) {
            DB::table('ledger_entries')->insert($ledgerEntry);
        }
    }
}
