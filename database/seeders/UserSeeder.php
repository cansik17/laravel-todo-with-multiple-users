<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user one',
            'email' => 'userone@gmail.com',
            'password' => bcrypt('10203040'),

        ]);
        DB::table('users')->insert([
            'name' => 'user two',
            'email' => 'usertwo@gmail.com',
            'password' => bcrypt('10203040'),

        ]);
        DB::table('users')->insert([
            'name' => 'user three',
            'email' => 'userthree@gmail.com',
            'password' => bcrypt('10203040'),

        ]);
        DB::table('users')->insert([
            'name' => 'user four',
            'email' => 'userfour@gmail.com',
            'password' => bcrypt('10203040'),

        ]);
        DB::table('users')->insert([
            'name' => 'user five',
            'email' => 'userfive@gmail.com',
            'password' => bcrypt('10203040'),

        ]);
        DB::table('users')->insert([
            'name' => 'admin user',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('10203040'),

        ]);
    }
}
