<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class resto_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('restos')->insert([
            'resto_name' => 'McDonald\'s',
            'resto_address' => 'jl. melati no.19',
            'resto_rating' => 5,
            'resto_description' => 'Open 09 am - 10 pm',
            'path' => 'storage/assets/images/mcdonalds.jpg',
        ]);
        DB::table('restos')->insert([
            'resto_name' => 'Burger King',
            'resto_address' => 'jl. mawar no.15',
            'resto_rating' => 4,
            'resto_description' => 'Open 09 am - 10 pm',
            'path' => 'storage/assets/images/burgerking.jpg',
        ]);
        DB::table('restos')->insert([
            'resto_name' => 'Pizza Hut',
            'resto_address' => 'jl. durian no.9',
            'resto_rating' => 4.8,
            'resto_description' => 'Open 09 am - 10 pm',
            'path' => 'storage/assets/images/pizzahut.jpg',
        ]);
        DB::table('restos')->insert([
            'resto_name' => 'Restoran Sederhana',
            'resto_address' => 'jl. apel no. 12, 4',
            'resto_rating' => 4.5,
            'resto_description' => 'Open 09 am - 10 pm',
            'path' => 'storage/assets/images/sederhana.jpg',
        ]);
        DB::table('restos')->insert([
            'resto_name' => 'CFC',
            'resto_address' => ' jl. keju no.1, 4',
            'resto_rating' => 3.9,
            'resto_description' => 'Open 09 am - 10 pm',
            'path' => 'storage/assets/images/cfc.jpg',
        ]);
        DB::table('restos')->insert([
            'resto_name' => 'Saoenk Kito',
            'resto_address' => 'jl. anggur no.29',
            'resto_rating' => 4.2,
            'resto_description' => 'Open 09 am - 10 pm',
            'path' => 'storage/assets/images/saoenkkito.jpg',
        ]);
        DB::table('restos')->insert([
            'resto_name' => 'Geprek Bensu',
            'resto_address' => ' jl. mangga no.20, 4',
            'resto_rating' => 4.2,
            'resto_description' => 'Open 09 am - 10 pm',
            'path' => 'storage/assets/images/geprekbensu.jpg',
        ]);
        DB::table('restos')->insert([
            'resto_name' => 'Ayam Gepuk Pak Gembus',
            'resto_address' => 'jl. nanas no.17, 4',
            'resto_rating' => 4.2,
            'resto_description' => 'Open 09 am - 10 pm',
            'path' => 'storage/assets/images/pakgembus.jpg',
        ]);
        DB::table('restos')->insert([
            'resto_name' => 'Marugame Udon',
            'resto_address' => 'jl. duku no.25',
            'resto_rating' => 4.2,
            'resto_description' => '09 am - 10 pm',
            'path' => 'storage/assets/images/marugameudon.jpg',
        ]);
        DB::table('restos')->insert([
            'resto_name' => 'Sushi Tei',
            'resto_address' => 'jl. semangka no.31',
            'resto_rating' => 4.2,
            'resto_description' => 'Open 09 am - 10 pm',
            'path' => 'storage/assets/images/sushitei.jpg',
        ]);
        DB::table('restos')->insert([
            'resto_name' => 'Rocky Rooster',
            'resto_address' => ' jl. persik no.22',
            'resto_rating' => 4.2,
            'resto_description' => ' Open 09 am - 10 pm',
            'path' => 'storage/assets/images/rockyrooster.jpg',
        ]);

    }
}
