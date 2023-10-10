<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RealEstate>
 */
class RealEstateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'area' => fake()->numberBetween(50, 100),
            'price' => fake()->numberBetween(1000000, 3000000),
            'desc' => fake()->text(),
            'address' => fake()->address(),
            'cate' => fake()->numberBetween(1,3),
        ];
    }
}
