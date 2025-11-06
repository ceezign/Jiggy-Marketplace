<x-app-layout title="Shop">
<section class="shop-page">
  <div class="mp-container">
    <h1>Shop</h1>
    <form method="GET" action="{{ route('item.index') }}">
      <input type="text" name="q" value="{{ request('q') }}" placeholder="Search items...">
      <button type="submit">Search</button>
    </form>

    <div class="items-grid">
      @foreach($items as $item)
        <div class="item-card">
          <img src="{{ $item->image ?? '/images/placeholder.png' }}" alt="{{ $item->name }}" />
          <h3>{{ $item->name }}</h3>
          <p>{{ Str::limit($item->description, 80) }}</p>
          <p><strong>₦{{ number_format($item->price) }}</strong></p>
          <a href="{{ route('item.show', $item->id) }}" class="btn">View</a>
        </div>
      @endforeach
    </div>
    <div class="pagination">{{ $items->links() }}</div>
  </div>
</section>
<style>
.items-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:16px; margin-top:16px; }
.item-card { padding:12px; border-radius:8px; background:#fff; box-shadow:0 6px 18px rgba(0,0,0,0.04); text-align:center; }
.item-card img { max-width:100%; height:140px; object-fit:cover; border-radius:6px; }
</style>
</x-app-layout>