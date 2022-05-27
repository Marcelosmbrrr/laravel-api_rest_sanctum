<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TelephoneModel;

class TelephoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TelephoneModel::create(
            ["user_id" => 1, "country_code" => '55', "area_code" => '53', "number" => '991084561']
        );
    }
}
