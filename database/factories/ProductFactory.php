<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\Types\Null_;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'quantity' => $this->faker->randomNumber($nbDigits = NULL),
            'price' => $this->faker->randomFloat(2,10,1000),
        ];
    }
}
