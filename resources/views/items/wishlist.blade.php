<x-app-layout title="Wishlist">
  <div class="wishlist-container">
      <h2 class="wishlist-title">My Wishlist</h2>

      @if($wishlist->count() > 0) 
        <table class="wishlist-table">
          <thead>
            <tr>
              <th>Item</th>
              <th>Title</th>
              <th>Price</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
           @foreach($wishlist as $wish)
            <tr>
              <td>
                <img src="{{ $wish->image) }}" alt="{{ $wish->name }}" class="wishlist-img">
              </td>
              <td>{{ $wish->name }}</td>
              <td>₦{{ number_format($wish->price, 2) }}</td>
              <td>
                <a href="{{ route('item.removeFromWishlist', $wish->id) }}" class="btn remove-btn">Remove</a>
                <form action="{{ route('cart.addToCart', $wish->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn add-cart-btn">Buy Now</button>
                </form>
              </td>
            </tr>
            @endforeach
            <div class="pagination-links">{{ $wishlist->links() }}</div>
          </tbody>
        </table>
       @else
        <p class="empty-wishlist">Your wishlist is empty.</p>
      @endif

    </div>
</x-app-layout>