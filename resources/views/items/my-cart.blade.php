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
          @foreach($cartItems as $cart)
            <tr>
              <td>
                <img src="{{ $cart->item->image }}" alt="{{ $cart->item->name }}" class="cart-img">
              </td>
              <td>{{ $cart->item->name }}</td>
              <td>₦{{ number_format($cart->item->price, 2) }}</td>
              <td>
                <form action="/cart/update/{cartItemId}" method="POST">
                  @csrf
                  <input type="number" name="quantity" value="{{ $cart->quantity }}" min="1" class="qty-input">
                  <button type="submit" class="btn update-btn">Update</button>
                </form>
              </td>
              <td>₦{{ number_format($cart->item->price * $cart->quantity, 2) }}</td>
              <td>
                <a href="/cart/remove/{cartItemId}" class="btn remove-btn">Remove</a>
              </td>
            </tr>
          @endforeach
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
