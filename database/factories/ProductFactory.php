<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// Model
use App\Models\ProductModel;

class ProductFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => 'Description of the test product',
            'price' => 100.0
        ];
    }
}
