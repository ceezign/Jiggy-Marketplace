@props(['item'])


<div class="item-container">
    <div class="item-image">
      <a href="{{ route('item.show', $item) }}">
        <img src="{{ $item->image }}" alt="{{ $item->name }}">
      </a>
    </div>

    <div class="item-details">
      <h2 class="item-title">{{ $item->name }}</h2>
      <p class="item-category"><strong>Category:</strong> {{ ucfirst($item->category->name) }}</p>
      <p class="item-price">₦{{ number_format($item->price, 2) }}</p>
      <p class="item-description">{{ $item->description }}</p>


      <div class="item-actions">
        <form action="{{ route('item.addToWishlist',  $item->id) }}" method="POST" style="display:inline;">
          @csrf
          <button type="submit" class="btn edit-btn">Add to Wishlist</button>
        </form>
        <form action="{{ route('cart.addToCart', $item->id) }}" method="POST" style="display:inline;">
          @csrf
          <button type="submit" class="btn buy-btn">Buy Now</button>
        </form>

      </div>
    </div>
  </div>

