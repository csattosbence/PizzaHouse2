<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => 'overridden',
            'name' => 'overridden',
            'description' => 'This is a tasty pizza',
            'price' => $this->faker->numberBetween(1500,2000)
        ];
    }
}
