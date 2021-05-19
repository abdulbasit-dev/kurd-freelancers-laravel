<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['Male', 'Female', 'Other'];
        for ($i = 0; $i < count($arr); $i++) {
            Gender::create([
                'name' => $arr[$i]
            ]);
        }
    }
}
