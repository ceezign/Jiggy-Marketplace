<?php

namespace Database\Factories;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
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
            'total_amount' => fake()->numberBetween(5000, 10000),
            "payment_status" => fake()->randomElement(["pending", "paid", "cancelled"]),
            'order_status' => fake()->randomElement(['processing', 'successful', 'failed']),
            'shipping_address' =>fake()->address(),
        ];
    }
}
