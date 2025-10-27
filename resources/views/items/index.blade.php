<x-app-layout title="My Items">

<section>

  <div class="cart-container">
    <h2 class="cart-title">My Items</h2>

    @if($items->isEmpty())
      <div class="text-center">
        <h5>You have not created any items yet.</h5>
        <a href="{{ route('item.create') }}" class="btn btn-primary mt-3">Add New Item</a>
      </div>
    @else
      <table class="cart-table">
        <thead>
          <tr>
            <th>Item</th>
            <th>Name</th>
            <th>Price</th>
            <!-- <th>Quantity</th> -->
            <th>Reviews</th>
            <th>Date Created</th>
            <!-- <th>Total</th> -->
            <th>Edit</th>
            <th>Action</th>
          
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
            <tr>
              <td>
                <img src="{{ $item->image }}" alt="{{ $item->name }}" class="cart-img">
              </td>
              <td>{{ $item->name }}</td>
              <td>₦{{ number_format($item->price, 2) }}</td>
              <td>{{ $item->reviews->count() }}</td>
              <td>{{ $item->created_at->format('d M, Y') }}</td>
              <!-- <td>
                <form action="/cart/edit/{{ $item->id}}" method="POST">
                  @csrf
                  <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="qty-input">
                  <button type="submit" class="btn update-btn">Update</button>
                </form>
              </td> -->
              <!-- <td>₦{{ number_format($item->price * $item->quantity, 2) }}</td> -->
              <td>
                <a href="{{ route('item.edit', $item->id ) }}" class="btn remove-btn">Edit</a>
              </td>
              <td>
                <form action="{{ route('item.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn remove-btn">Remove</button>
                </form>
              </td>
              
            </tr>
          @endforeach
          <div class="pagination-links">{{ $items->links() }}</div>
        </tbody>
      </table>

      <!-- <div class="cart-summary">
        <p><strong>Subtotal:</strong> ₦9999</p>
        <p><strong>Total:</strong> ₦9999</p>
        <a href="/checkout" class="btn checkout-btn">Proceed to Checkout</a>
      </div> -->

    @endif

    <!-- {{-- @else --}}
      <p class="empty-cart">Your cart is empty.</p>
    {{-- @endif --}} -->

  </div>
</section>
</x-app-layout>
