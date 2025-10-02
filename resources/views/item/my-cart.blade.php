<x-app-layout title="My Cart">

<section>

  <div class="cart-container">
    <h2 class="cart-title">My Cart</h2>

    {{-- @if(count($cartItems) > 0) --}}
      <table class="cart-table">
        <thead>
          <tr>
            <th>Item</th>
            <th>Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          {{-- @foreach($cartItems as $item) --}}
          <tr>
            <td>
              <img src="#" alt="#" class="cart-img">
            </td>
            <td>title</td>
            <td>₦999</td>
            <td>
              <form action="/cart/update/#" method="POST">
                @csrf
                <input type="number" name="quantity" value="#" min="1" class="qty-input">
                <button type="submit" class="btn update-btn">Update</button>
              </form>
            </td>
            <td>₦$item->quantity, 999</td>
            <td>
              <a href="/cart/remove/#" class="btn remove-btn">Remove</a>
            </td>
          </tr>
          {{-- @endforeach --}}
        </tbody>
      </table>

      <div class="cart-summary">
        <p><strong>Subtotal:</strong> ₦9999</p>
        <p><strong>Total:</strong> ₦9999</p>
        <a href="/checkout" class="btn checkout-btn">Proceed to Checkout</a>
      </div>

    {{-- @else --}}
      <p class="empty-cart">Your cart is empty.</p>
    {{-- @endif --}}

  </div>
</section>
</x-app-layout>
