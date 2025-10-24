<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = User::find(1)
            ->items()
            ->with(['category', 'reviews', 'orderItems', 'cartItems'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('items.index', ['items' => $items] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('items.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'description' => 'nullable|string',
        ]);
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('items', 'public');
        }

        $validated['user_id' ] = 1;
        Item::create($validated);

        return redirect()->route('item.index')->with('Success', 'Item created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::findOrFail($id);
        return view('items.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();
        return view('items.edit', ['item' => $item, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Item::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'description' => 'nullable|string',
        ]);
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('items', 'public');
        }
        $item->update($validated);

        return redirect()->route('items.index')->with('suceess', 'Item updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = User::find(1)
            ->items()
            ->findOrFail($id);
        $item->delete();

        return redirect()->route('items')->with('success', 'item deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $items = Item::with('category')
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->orderBy('created_by', 'desc');
            
            
        
        return view('items.search', ['items' => $items, 'query' => $query]);
    }

    public function addToWishlist(string $id)
    {
        Wishlist::firstOrCreate([
            'item_id' => $id,
        ]);

        return back()->with('success', 'Item added to wishlist!');
    }

    public function wishlist()
    {
        $wishlist = Wishlist::with('item')->latest()->paginate(10);
        return view('items.wishlist', ['wishlist' => $wishlist]);
    }

    public function removeFromWishlist($id)
    {
        Wishlist::where('item_id', $id)->delete();
        return back()->with('success', 'Item remove from wishlist!');
    }
}
