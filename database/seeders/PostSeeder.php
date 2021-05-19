<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $faker = Factory::create();
        for ($i = 0; $i < 201; $i++) {
            Post::create([
                "title" => $faker->sentence(3),
                "description" => $faker->sentence(100),
                "status" => rand(0, 1),
                "user_id" => User::inRandomOrder()->first()->id,
                "tag" => Tag::inRandomOrder()->first()->id,
                "location" => City::inRandomOrder()->first()->id,
                "deadline" => $faker->date('Y-m-d', 'now'),
                "reject"  => rand(0, 1),
                "reject_resone"  => $faker->sentence(5)

            ]);
        }
    }
}
