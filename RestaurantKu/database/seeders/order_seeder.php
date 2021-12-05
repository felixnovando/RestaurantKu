<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class order_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'customer_id' => 1,
            'resto_id' => 1,
            'status' => 'paid',
            'order_time' => date_time_set(date_create('2020-08-27'),12,0,0),
        ]);
        DB::table('orders')->insert([
            'customer_id' => 2,
            'resto_id' => 2,
            'status' => 'paid',
            'order_time' => date_time_set(date_create('2020-08-27'),12,0,0),
        ]);
        DB::table('orders')->insert([
            'customer_id' => 3,
            'resto_id' => 3,
            'status' => 'paid',
            'order_time' => date_time_set(date_create('2020-08-27'),12,0,0),
        ]);
        DB::table('orders')->insert([
            'customer_id' => 4,
            'resto_id' => 1,
            'status' => 'canceled',
            'order_time' => date_time_set(date_create('2020-08-27'),12,0,0),
            'reservation_id' => 1,
        ]);
        DB::table('orders')->insert([
            'customer_id' => 5,
            'resto_id' => 2,
            'status' => 'ongoing',
            'order_time' => date_time_set(date_create('2020-08-27'),12,0,0),
            'reservation_id' => 2,
        ]);
    }
}
