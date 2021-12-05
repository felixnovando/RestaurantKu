<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class customer_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('customers')->insert([
            'customer_name' => 'john',
            'customer_gender' => 'male',
            'customer_email' => 'john1506@gmail.com',
            'customer_password' => password_hash('john',PASSWORD_BCRYPT),
            'customer_dob' => date('1989-06-15'),
            'role_id'=>1
        ]);
        DB::table('customers')->insert([
            'customer_name' => 'patrick',
            'customer_gender' => 'male',
            'customer_email' => 'pat2408@gmail.com',
            'customer_password' => password_hash('pat',PASSWORD_BCRYPT),
            'customer_dob' => date('1992-08-24'),
            'role_id'=>1
        ]);
        DB::table('customers')->insert([
            'customer_name' => 'jane',
            'customer_gender' => 'female',
            'customer_email' => 'jane1803@gmail.com',
            'customer_password' => password_hash('jane',PASSWORD_BCRYPT),
            'customer_dob' => date('1994-03-18'),
            'role_id'=>1
        ]);
        DB::table('customers')->insert([
            'customer_name' => 'lee',
            'customer_gender' => 'male',
            'customer_email' => 'lee0707@gmail.com',
            'customer_password' => password_hash('lee',PASSWORD_BCRYPT),
            'customer_dob' => date('1995-07-07'),
            'role_id'=>2
        ]);
        DB::table('customers')->insert([
            'customer_name' => 'alice',
            'customer_gender' => 'female',
            'customer_email' => 'alice0405@gmail.com',
            'customer_password' => password_hash('alice',PASSWORD_BCRYPT),
            'customer_dob' => date('1986-05-04'),
            'role_id'=>2
        ]);
        DB::table('customers')->insert([
            'customer_name' => 'andres holivin',
            'customer_gender' => 'male',
            'customer_email' => 'andres.holivin@binus.ac.id',
            'customer_password' => password_hash('12345',PASSWORD_BCRYPT),
            'customer_dob' => date('1986-05-04'),
            'role_id'=>3
        ]);
    }
}
