<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagArr = ["front-end", "back-end", "laravel", "react.js", "node.js", "vue.js", "figma", "adobe xd", "bootsrap", "tailwind"];
        for ($i = 0; $i < count($tagArr); $i++) {
            Tag::create([
                "name" => $tagArr[$i]
            ]);
        }
    }
}
