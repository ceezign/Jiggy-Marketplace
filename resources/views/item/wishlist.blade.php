<x-app-layout>
  <div class="wishlist-container">
      <h2 class="wishlist-title">My Wishlist</h2>

      {{-- @if(count($wishlistItems) > 0) --}}
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
            {{-- @foreach($wishlistItems as $item) --}}
            <tr>
              <td>
                <img src="#" class="wishlist-img">
                {{-- <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="wishlist-img"> --}}
              </td>
              {{-- <td>{{ $item->title }}</td> --}}
              <td>title</td>
              <td>₦1222</td>
              {{-- <td>₦{{ number_format($item->price, 2) }}</td> --}}
              <td>
                <a href="/wishlist/remove/#" class="btn remove-btn">Remove</a>
                <a href="/cart/add/#" class="btn add-cart-btn">Add to Cart</a>
                {{-- <a href="/cart/add/{{ $item->id }}" class="btn add-cart-btn">Add to Cart</a> --}}
              </td>
            </tr>
            {{-- @endforeach --}}
          </tbody>
        </table>
      {{-- @else
        <p class="empty-wishlist">Your wishlist is empty.</p>
      @endif --}}

    </div>
</x-app-layout>