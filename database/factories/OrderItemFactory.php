<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Order;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quantity = fake()->numberBetween(1, 10);
        $price = ((int)fake()->randomFloat(2, 1000, 30000));

        return [
            'order_id' => Order::inRandomOrder()->first()->id,
            'item_id' => Item::inRandomOrder()->first()->id,
            'quantity' => $quantity,
            'price' => $price,
            'subtotal' => $quantity * $price,

        ];
    }
}
