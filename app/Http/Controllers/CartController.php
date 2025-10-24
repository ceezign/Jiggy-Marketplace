<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $user = User::find(1);

        $cart = $user->cart;

        $cartItems = $cart ? $cart->cartItems()
            ->with(['item.category'])
            ->orderby('created_at', 'desc')
            ->get() : collect();

        
        return view('items.my-cart', ['cartItems' => $cartItems]);

    }

    public function addToCart($itemId)
    {
        $user = User::find(1);

        $cart = $user->cart ?: $user->cart()->create();

        $item = Item::findOrFail($itemId);

        $cartItem = $cart->cartItems()->where('item_id', $itemId)->first();

        if ($cartItem) {
            return redirect()->back()->with('message', 'Item already in cart');
        }

        // if ($cart->cartItems()->where('item_id', $itemId)->exists()) {
        //     return redirect()->back()->with('message', 'item already in cart');
        // }
        $quantity = 1;
        $subtotal = $item->price * $quantity;

        $cart->cartItems()->create([
            'item_id' => $itemId,
            'quantity' => $quantity,
            'subtotal' => $subtotal,
        ]);

        return redirect()->route('cart.index')->with('message', 'item added to cart successfully');
    }

    public function removeFromCart($cartItemId)
    {
        $user = User::find(1);

        $cart = $user->cart;

        if ($cart) {
            $cartItem = $cart->cartItems()->findOrFail($cartItemId);
            $cartItem->delete();
        }


        return redirect()->back()->with('message', 'item remove from cart. ');
    }

    public function updateQuantity(Request $request, $cartItemId)
    {
        $user = User::find(1);

        $cart = $user->cart;

        if ($cart) {
            $cartItem = $cart->cartItems()->findOrFail($cartItemId);
            $cartItem->update([
                'quantity' => $request->quantity
        ]);
        }

    
       
        return redirect()->back()->with('message', 'Cart updated successfully ');
    }



}
