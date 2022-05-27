<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserModel::create(
            ["name" => "Admin", "email" => "admin@gmail.com", "password" => "admin"]
        );
    }
}
