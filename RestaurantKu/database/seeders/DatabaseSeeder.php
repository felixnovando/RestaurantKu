<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(customer_seeder::class);
        $this->call(resto_seeder::class);
        $this->call(reservation_seeder::class);
        $this->call(order_seeder::class);
        $this->call(pickup_seeder::class);
        $this->call(menu_seeder::class);
        $this->call(order_detail_seeder::class);
        $this->call(pickup_detail_seeder::class);
    }
}
