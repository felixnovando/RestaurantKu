<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class order_detail_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_details')->insert([
            'order_id' => 1,
            'menu_id' => 1,
            'qty' => 3,
            'description' => 'tidak pakai cabe'
        ]);
        DB::table('order_details')->insert([
            'order_id' => 1,
            'menu_id' => 2,
            'qty' => 3,
            'description' => 'tidak pakai cabe'
        ]);


        DB::table('order_details')->insert([
            'order_id' => 2,
            'menu_id' => 6,
            'qty' => 3,
            'description' => 'tidak pakai cabe'
        ]);
        DB::table('order_details')->insert([
            'order_id' => 2,
            'menu_id' => 7,
            'qty' => 3,
            'description' => 'tidak pakai cabe'
        ]);

        DB::table('order_details')->insert([
            'order_id' => 3,
            'menu_id' => 11,
            'qty' => 3,
            'description' => 'tidak pakai cabe'
        ]);
        DB::table('order_details')->insert([
            'order_id' => 3,
            'menu_id' => 12,
            'qty' => 3,
            'description' => 'tidak pakai cabe'
        ]);


        DB::table('order_details')->insert([
            'order_id' => 4,
            'menu_id' => 1,
            'qty' => 3,
            'description' => 'tidak pakai cabe'
        ]);
        DB::table('order_details')->insert([
            'order_id' => 4,
            'menu_id' => 2,
            'qty' => 3,
            'description' => 'tidak pakai cabe'
        ]);


        DB::table('order_details')->insert([
            'order_id' => 5,
            'menu_id' => 6,
            'qty' => 3,
            'description' => 'tidak pakai cabe'
        ]);
        DB::table('order_details')->insert([
            'order_id' => 5,
            'menu_id' => 7,
            'qty' => 3,
            'description' => 'tidak pakai cabe'
        ]);
    }
}
