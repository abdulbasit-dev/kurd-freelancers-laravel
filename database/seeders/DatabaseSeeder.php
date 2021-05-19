<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {


    // \App\Models\User::factory(10)->create();

    $this->call(UserSeeder::class);
    $this->call(CitySeeder::class);
    $this->call(TagSeeder::class);
    // $this->call(PostSeeder::class);
    $this->call(RoleSeeder::class);
    $this->call(LanguageSeeder::class);
    $this->call(GenderSeeder::class);
  }
}
