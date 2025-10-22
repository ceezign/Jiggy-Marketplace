<x-app-layout title="Item Show">
    

<section>
<div class="item-container">
    <div class="item-card">
        <div class="item-image">
            <img src="{{ $item->image }}" alt="{{ $item->name }}">
        </div>
        <div class="item-details">
            <h1 class="item-name">{{ $item->name }}</h1>
            <p class="item-category"><strong>{{ $item->category->name }}</strong> #</p>
            <p class="item-description">{{ $item->description }}</p>
            <p class="item-price">₦{{ number_format($item->price, 2) }}</p>

            <div class="item-actions">
                <form action="{{ route('cart.addToCart', $item->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-cart">Add to Cart</button>
                </form>
                
                <form action="{{ route('item.addToWishlist', $item->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-wishlist">Add to Wishlist</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
    
</x-app-layout>
