<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pickup_detail_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pickup_details')->insert([
            'pickup_id' => 1,
            'menu_id' => 1,
            'qty' => 3,
            'description' => 'no chili'
        ]);
        DB::table('pickup_details')->insert([
            'pickup_id' => 1,
            'menu_id' => 2,
            'qty' => 3,
            'description' => 'no chili'
        ]);

        DB::table('pickup_details')->insert([
            'pickup_id' => 2,
            'menu_id' => 6,
            'qty' => 3,
            'description' => 'no chili'
        ]);
        DB::table('pickup_details')->insert([
            'pickup_id' => 2,
            'menu_id' => 7,
            'qty' => 3,
            'description' => 'no chili'
        ]);


        DB::table('pickup_details')->insert([
            'pickup_id' => 3,
            'menu_id' => 11,
            'qty' => 3,
            'description' => 'no chili'
        ]);
        DB::table('pickup_details')->insert([
            'pickup_id' => 3,
            'menu_id' => 12,
            'qty' => 3,
            'description' => 'no chili'
        ]);


        DB::table('pickup_details')->insert([
            'pickup_id' => 4,
            'menu_id' => 1,
            'qty' => 3,
            'description' => 'no chili'
        ]);
        DB::table('pickup_details')->insert([
            'pickup_id' => 4,
            'menu_id' => 2,
            'qty' => 3,
            'description' => 'no chili'
        ]);


        DB::table('pickup_details')->insert([
            'pickup_id' => 5,
            'menu_id' => 6,
            'qty' => 3,
            'description' => 'no chili'
        ]);
        DB::table('pickup_details')->insert([
            'pickup_id' => 5,
            'menu_id' => 7,
            'qty' => 3,
            'description' => 'no chili'
        ]);

    }
}
