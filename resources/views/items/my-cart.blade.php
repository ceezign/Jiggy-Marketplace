<x-app-layout title="My Cart">

<section>

  <div class="cart-container">
    <h2 class="cart-title">My Shoppping Cart</h2>

    @if($cartItems->isEmpty())
      <div class="text-center">
        <h5>Your cart is empty</h5>
        <a href="{{ route('home') }}" class="btn btn-primary mt-3">Continue Shopping</a>
      </div>
    @else
      <table class="cart-table">
        <thead>
          <tr>
            <th>Item</th>
            <th>name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cartItems as $cartItem)
            <tr>
              <td>
                <img src="{{ $cartItem->item->image }}" alt="{{ $cartItem->item->name }}" class="cart-img">
              </td>
              <td>{{ $cartItem->item->name }}</td>
              <td>₦{{ number_format($cartItem->item->price, 2) }}</td>
              <td>
                <form action="{{ route('cart.updateQuantity', $cartItem->id) }}" method="POST">
                  @csrf
                  @method('PATCH')
                  <input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1" class="qty-input">
                  <button type="submit" class="btn update-btn">Update</button>
                </form>
              </td>
              <td>₦{{ number_format($cartItem->item->price * $cartItem->quantity, 2) }}</td>
              <td>
                <form action="{{ route('cart.removeFromCart', $cartItem->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn remove-btn">Remove</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      @php
        $subtotal = $cartItems->sum(fn($item) => $item->item->price * $item->quantity);
      @endphp
      
      <div class="cart-summary">
        <p><strong>Subtotal:</strong> ₦{{ number_format($subtotal, 2) }}</p>
        <a href="/checkout" class="btn checkout-btn">Proceed to Checkout</a>
      </div>

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
