<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'name' => fake()->word(2, true),
            'description' => fake()->paragraph(),
            'price' => ((int)fake()->randomFloat(2, 1000, 30000)),
            'quantity' => fake()->numberBetween(1, 10),
            'image' => fake()->imageUrl(),
            'status' => fake()->randomElement(['available', 'unavailable'])

        ];
    }
}
