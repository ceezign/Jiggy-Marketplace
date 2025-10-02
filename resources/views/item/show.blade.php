<x-app-layout title="Item Show">
    

<section>
<div class="item-container">
    <div class="item-card">
        <div class="item-image">
            <img src="#" alt="#">
        </div>
        <div class="item-details">
            <h1 class="item-name">#</h1>
            <p class="item-category"><strong>Category:</strong> #</p>
            <p class="item-description">description</p>
            <p class="item-price">₦2000</p>

            <div class="item-actions">
                <form action="" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-cart">Add to Cart</button>
                </form>
                
                <form action="" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-wishlist">Add to Wishlist</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
    
</x-app-layout>


{{-- @extends('layouts.app')  --}}
{{-- assuming you have a layout file with header & footer --}}

{{-- @section('title', $item->name)

@section('content')
<div class="item-container">
    <div class="item-card">
        <div class="item-image">
            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
        </div>
        <div class="item-details">
            <h1 class="item-name">{{ $item->name }}</h1>
            <p class="item-category"><strong>Category:</strong> {{ $item->category->name ?? 'N/A' }}</p>
            <p class="item-description">{{ $item->description }}</p>
            <p class="item-price">₦{{ number_format($item->price, 2) }}</p>

            <div class="item-actions">
                <form action="{{ route('cart.store', $item->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-cart">Add to Cart</button>
                </form>
                
                <form action="{{ route('wishlist.store', $item->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-wishlist">Add to Wishlist</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection --}}
