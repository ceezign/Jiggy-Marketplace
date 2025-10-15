<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $items = Item::where('published_at', '<', now())
            ->with('category', 'user', 'reviews', 'orderItems', 'cartItems', )
            ->orderBy('published_at', 'desc')
            ->limit(30)
            ->get();

            
        return view('home.index', ['items' => $items]);
    }
}
