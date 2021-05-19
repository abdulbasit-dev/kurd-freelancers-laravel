<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['Admin', 'Publisher', 'Supper Admin'];

        for ($i = 0; $i < count($arr); $i++) {
            Role::create([
                'role_name' => $arr[$i]
            ]);
        }
    }
}
