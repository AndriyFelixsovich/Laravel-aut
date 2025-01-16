<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->JobTitle,
            'short_text' => fake()->text (maxNbChars: 120),
            'text' => fake ()->realText,
            'price' => fake ()->numberBetween (int1: 1_000, int2: 999_999),
            'quantity' => fake()->numberBetween (int1: 0, int2: 1000),
            'is_published' => fake ()->boolean,
            'collections_id' => fake()->numberBetween (int1: 1, int2: 20)
        ];
    }
}
