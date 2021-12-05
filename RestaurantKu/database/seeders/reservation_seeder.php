<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class reservation_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([
            'customer_id' => 1,
            'reservation_time' => date_time_set(date_create('2020-08-27'),12,0,0),
            'status' => "canceled",
            'adult_seats' => 1,
            'child_seats' => 2,
            'baby_seats' => 1,
            'resto_id' => '1'
        ]);
        DB::table('reservations')->insert([
            'customer_id' => 2,
            'reservation_time' => date_time_set(date_create('2020-08-27'),12,00,00),
            'status' => "ongoing",
            'adult_seats' => 2,
            'child_seats' => 1,
            'baby_seats' => 1,
            'resto_id' => '2'
        ]);
        DB::table('reservations')->insert([
            'customer_id' => 3,
            'reservation_time' => date_time_set(date_create('2020-08-27'),12,00,00),
            'status' => "ongoing",
            'adult_seats' => 3,
            'child_seats' => 1,
            'baby_seats' => 1,
            'resto_id' => '3'
        ]);
        DB::table('reservations')->insert([
            'customer_id' => 4,
            'reservation_time' => date_time_set(date_create('2020-08-27'),12,00,00),
            'status' => "ongoing",
            'adult_seats' => 3,
            'child_seats' => 1,
            'baby_seats' => 1,
            'resto_id' => '1'
        ]);
        DB::table('reservations')->insert([
            'customer_id' => 5,
            'reservation_time' => date_time_set(date_create('2020-08-27'),12,00,00),
            'status' => "ongoing",
            'adult_seats' => 1,
            'child_seats' => 2,
            'baby_seats' => 1,
            'resto_id' => '2'
        ]);
    }
}
