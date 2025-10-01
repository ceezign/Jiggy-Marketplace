<div class="item-container">
    <div class="item-image">
      {{-- <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"> --}}
      <img src="" alt="#">
    </div>

    <div class="item-details">
      {{-- <h2 class="item-title">{{ $item->title }}</h2>
      <p class="item-category"><strong>Category:</strong> {{ ucfirst($item->category) }}</p>
      <p class="item-price">₦{{ number_format($item->price, 2) }}</p>
      <p class="item-description">{{ $item->description }}</p> --}}

      <h2 class="item-title">title</h2>
      <p class="item-category"><strong>Category:</strong> CAtegory</p>
      <p class="item-price">₦2000</p>
      <p class="item-description">description</p>

      <div class="item-actions">
        {{-- <a href="/items/{{ $item->id }}/edit" class="btn edit-btn">Edit</a>
        <a href="/cart/add/{{ $item->id }}" class="btn buy-btn">Buy Now</a> --}}
        <a href="/items/#/edit" class="btn edit-btn">Edit</a>
        <a href="/cart/add/#" class="btn buy-btn">Buy Now</a>

      </div>
    </div>
  </div>

