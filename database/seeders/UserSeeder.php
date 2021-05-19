<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
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


        User::create([
            'name' => 'abdulbasit',
            'email' => 'basit@test.com',
            'password' => bcrypt("password"),
            'is_admin' => true,
            "role_id" => 3
        ]);
        User::create([
            'name' => 'omid',
            'email' => 'omid@test.com',
            'password' => bcrypt("password"),
            'is_admin' => true,
            "role_id" => 2
        ]);
        User::create([
            'name' => 'revan',
            'email' => 'revan@test.com',
            'password' => bcrypt("password"),
            'is_admin' => true,
            "role_id" => 1
        ]);
        User::create([
            'name' => 'mardy',
            'email' => 'mardy@test.com',
            'password' => bcrypt("password"),
            'is_admin' => true,
            "role_id" => 1
        ]);
        User::create([
            'name' => 'ibrahim',
            'email' => 'ibrahim@test.com',
            'password' => bcrypt("password"),
            'is_admin' => true,
            "role_id" => 1
        ]);
        User::create([
            'name' => 'ahmed',
            'email' => 'ahmed@test.com',
            'password' => bcrypt("password"),
            'is_admin' => true,
            "role_id" => 1
        ]);
    }
}
