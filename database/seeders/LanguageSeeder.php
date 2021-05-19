<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;


class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['Kurdish', 'Arabic', 'English'];
        for ($i = 0; $i < count($arr); $i++) {
            Language::create([
                'name' => $arr[$i]
            ]);
        }
    }
}
