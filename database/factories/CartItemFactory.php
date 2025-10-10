<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Item;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $cart = Cart::inRandomOrder()->first() ?? Cart::factory()->create();
        $item = Item::inRandomOrder()->first() ?? Item::factory()->create();

        $quantity = fake()->numberBetween(1, 10);
        $subtotal = $item->price * $quantity;
        
        return [
            'cart_id' => $cart->id,
            'item_id' => $item->id,
            'quantity' => $quantity,
            'subtotal' => $subtotal,
        ];
    }
}
