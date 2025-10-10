<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user = User::inRandomOrder()->first() ?? User::factory()->create();
        $order =  Order::inRandomOrder()->first() ?? Order::factory()->create(['user_id' => $user->id]);
        return [
            'user_id' => $user->id,
            'order_id' => $order->id,
            'payment_method' => fake()->randomElement(['card', 'bank_tranfer' , 'wallet']),
            'transaction_id' => fake()->unique()->uuid(),
            'amount' => ((int)fake()->randomFloat(2, 1000, 30000) ),
            'currency' => fake()->randomElement(['NGN', 'USD' , 'GDP']),
            'status' => fake()->randomElement(['pending', 'completed', 'failed']),
        ];
    }
}
