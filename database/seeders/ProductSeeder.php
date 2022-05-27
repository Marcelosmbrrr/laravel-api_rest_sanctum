<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductModel;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductModel::create(
            ["name" => 'Product A', "description" => 'This is the product A', "price" => 110.0]
        );
    }
}
