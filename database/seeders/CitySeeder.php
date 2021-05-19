<?php

namespace Database\Seeders;

use App\Models\City;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        City::create([
            "name" => "Erbil",
        ]);
        City::create([
            "name" => "Duhok",
        ]);
        City::create([
            "name" => "Selemnay",
        ]);
        City::create([
            "name" => "Kerkuk",
        ]);
    }
}
