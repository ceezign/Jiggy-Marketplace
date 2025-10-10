<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use App\Models\Payment;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Setting;
use App\Models\Review;
use App\Models\Cart;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Reset Faker unique memory
        fake()->unique(true);

        // 1️⃣ Users
        $users = User::factory(10)->create();

        // 2️⃣ Categories
        $categories = Category::factory(10)->create();

        // 3️⃣ Items (each linked to random category)
        $items = Item::factory(40)->create([
            'category_id' => $categories->random()->id,
        ]);

        // 4️⃣ Orders (each linked to random user)
        $orders = Order::factory(20)->create([
            'user_id' => $users->random()->id,
        ]);

        // 5️⃣ OrderItems (each linked to random Order + Item)
        $orderItems = OrderItem::factory(40)->create([
            'order_id' => $orders->random()->id,
            'item_id' => $items->random()->id,
        ]);

        $carts = Cart::factory(5)->create();

        // 6️⃣ CartItems (each linked to random cart + Item)
        $cartItems = CartItem::factory(30)->create([
            'cart_id' => $carts->random()->id,
            'item_id' => $items->random()->id,
            
        ]);

        // 7️⃣ Payments (linked to existing Orders + Users)
        $payments = Payment::factory(20)->create();

        // 8️⃣ Messages (linked to random User)
        $messages = Message::factory(15)->create([
            'sender_id' => $users->random()->id,
            'receiver_id' => $users->random()->id,
        ]);

        // 9️⃣ Notifications (linked to random User)
        $notifications = Notification::factory(15)->create([
            'user_id' => $users->random()->id,
        ]);

        // 🔟 Reviews (linked to random User + Item)
        $reviews = Review::factory(25)->create([
            'user_id' => $users->random()->id,
            'item_id' => $items->random()->id,
        ]);

        // 1️⃣1️⃣ Settings (one per user)
        foreach ($users as $user) {
            Setting::factory()->create([
                'user_id' => $user->id,
            ]);
        }

        $this->command->info('✅ All tables seeded successfully!');
    }
}







// namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;

// class DatabaseSeeder extends Seeder
// {
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

//         $this->call([
//             UserSeeder::class,
//             CategorySeeder::class,
//             ItemSeeder::class,
//             CartItemSeeder::class,
//             PaymentSeeder::class,
//             MessageSeeder::class,
//             SettingSeeder::class,
//             NotificationSeeder::class,
//             OrderSeedeer::class

//         ])
//     }
// }