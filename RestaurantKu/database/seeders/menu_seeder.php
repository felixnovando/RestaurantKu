<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class menu_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'resto_id' => 1,
            'menu_name' => 'fried chicken',
            'menu_price' => 20000,
            'menu_image' => 'storage/assets/images/fried_chicken.jpg',
            'menu_description' => 'fried chicken'
        ]);
        DB::table('menus')->insert([
            'resto_id' => 1,
            'menu_name' => 'french fries',
            'menu_price' => 15000,
            'menu_image' => 'storage/assets/images/french_fries.jpg',
            'menu_description' => 'fried potatoes'
        ]);
        DB::table('menus')->insert([
            'resto_id' => 1,
            'menu_name' => 'rice',
            'menu_price' => 8000,
            'menu_image' => 'storage/assets/images/rice.jpg',
            'menu_description' => 'just rice'
        ]);
        DB::table('menus')->insert([
            'resto_id' => 1,
            'menu_name' => 'chicken sandwich',
            'menu_price' => 10000,
            'menu_image' => 'storage/assets/images/chicken_sandwich.jpg',
            'menu_description' => 'chick sandwich is yummy'
        ]);
        DB::table('menus')->insert([
            'resto_id' => 1,
            'menu_name' => 'cola',
            'menu_price' => 8000,
            'menu_image' => 'storage/assets/images/cola.jpg',
            'menu_description' => 'coca cola'
        ]);


        DB::table('menus')->insert([
            'resto_id' => 2,
            'menu_name' => 'mushroom burger',
            'menu_price' => 20000,
            'menu_image' => 'storage/assets/images/mushroom_burger.jpg',
            'menu_description' => 'burger with an addition of mushroom'
        ]);
        DB::table('menus')->insert([
            'resto_id' => 2,
            'menu_name' => 'whopper',
            'menu_price' => 15000,
            'menu_image' => 'storage/assets/images/whopper.jpg',
            'menu_description' => 'the whopper burger'
        ]);
        DB::table('menus')->insert([
            'resto_id' => 2,
            'menu_name' => 'french fries',
            'menu_price' => 15000,
            'menu_image' => 'storage/assets/images/french_fries.jpg',
            'menu_description' => 'fried potatoes'
        ]);
        DB::table('menus')->insert([
            'resto_id' => 2,
            'menu_name' => 'cheese burger',
            'menu_price' => 20000,
            'menu_image' => 'storage/assets/images/cheese_burger.jpg',
            'menu_description' => 'burger with an addition of cheese'
        ]);
        DB::table('menus')->insert([
            'resto_id' => 2,
            'menu_name' => 'sprite',
            'menu_price' => 10000,
            'menu_image' => 'storage/assets/images/mushroom_burger.jpg',
            'menu_description' => 'a cup of iced sprite'
        ]);


        DB::table('menus')->insert([
            'resto_id' => 3,
            'menu_name' => 'meat lover',
            'menu_price' => 100000,
            'menu_image' => 'storage/assets/images/meat_lover.jpg',
            'menu_description' => 'this is a pizza with various meat topping',
        ]);
        DB::table('menus')->insert([
            'resto_id' => 3,
            'menu_name' => 'super supreme',
            'menu_price' => 100000,
            'menu_image' => 'storage/assets/images/super_supreme.jpg',
            'menu_description' => 'this is a super supreme pizza',
        ]);
        DB::table('menus')->insert([
            'resto_id' => 3,
            'menu_name' => 'cheese lover',
            'menu_price' => 100000,
            'menu_image' => 'storage/assets/images/cheese_lover.jpg',
            'menu_description' => 'this is a cheese pizza',
        ]);
        DB::table('menus')->insert([
            'resto_id' => 3,
            'menu_name' => 'pepperoni',
            'menu_price' => 100000,
            'menu_image' => 'storage/assets/images/papperoni.jpg',
            'menu_description' => 'this is a pepperoni pizza',
        ]);
        DB::table('menus')->insert([
            'resto_id' => 3,
            'menu_name' => 'lasagna',
            'menu_price' => 50000,
            'menu_image' => 'storage/assets/images/lasagna.jpg',
            'menu_description' => 'this is a lasagna',
        ]);
    }
}
