<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'name'=>'Customer'
        ]);
        DB::table('role')->insert([
            'name'=>'Manager'
        ]);
        DB::table('role')->insert([
            'name'=>'Restorant'
        ]);
    }
}
