<?php
namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        $items = Item::query();
        if ($q) {
            $items = $items->where('name','like','%'.$q.'%')->orWhere('description','like','%'.$q.'%');
        }
        $items = $items->paginate(12);
        return view('shop.index', compact('items','q'));
    }
}
