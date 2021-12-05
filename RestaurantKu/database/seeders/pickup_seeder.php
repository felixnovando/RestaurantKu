<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pickup_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pickups')->insert([
            'customer_id' => 1,
            'resto_id' => 1,
            'status' => 'paid',
            'pick_up_time' => date_time_set(date_create('2020-08-27'),12,0,0),
        ]);
        DB::table('pickups')->insert([
            'customer_id' => 2,
            'resto_id' => 2,
            'status' => 'paid',
            'pick_up_time' => date_time_set(date_create('2020-08-27'),12,0,0),
        ]);
        DB::table('pickups')->insert([
            'customer_id' => 3,
            'resto_id' => 3,
            'status' => 'canceled',
            'pick_up_time' => date_time_set(date_create('2020-08-27'),12,0,0),
        ]);
        DB::table('pickups')->insert([
            'customer_id' => 4,
            'resto_id' => 1,
            'status' => 'paid',
            'pick_up_time' => date_time_set(date_create('2020-08-27'),12,0,0),
        ]);
        DB::table('pickups')->insert([
            'customer_id' => 5,
            'resto_id' => 2,
            'status' => 'ongoing',
            'pick_up_time' => date_time_set(date_create('2020-08-27'),12,0,0),
        ]);
    }
}
