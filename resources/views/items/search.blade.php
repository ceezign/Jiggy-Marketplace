<x-app-layout title="Item Search">

    <section class="py-5">
        <div class="container">
            <!-- Search Form -->
            <div class="search-advanced-wrapper mb-5">
                <form action="{{ route('item.search') }}" method="GET" class="search-advanced-form">

                    <!-- Keyword -->
                    <div class="form-group">
                        <label for="query">Keyword</label>
                        <input
                            type="text"
                            id="query"
                            name="query"
                            placeholder="Search by item name..."
                            value="{{ request('query') }}">
                    </div>

                    <!-- Category -->
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category">
                            <option value="">All categories</option>
                            @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Price Range -->
                    <div class="form-group two-column">
                        <div>
                            <label for="min_price">Min Price (₦)</label>
                            <input
                                type="number"
                                id="min_price"
                                name="min_price"
                                value="{{ request('min_price') }}"
                                placeholder="e.g. 5000">
                        </div>
                        <div>
                            <label for="max_price">Max Price (₦)</label>
                            <input
                                type="number"
                                id="max_price"
                                name="max_price"
                                value="{{ request('max_price') }}"
                                placeholder="e.g. 200000">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="search-btn">🔍 Search</button>
                </form>
            </div>


            
            <!-- Search Results -->
            <h3 class="mb-4">Search Results</h3>

            @if($items->count() > 0)
            <div class="row">
                @foreach($items as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <a href="{{ route('item.show', $item->id) }}">
                            <img
                                src="{{ asset('storage/' . $item->image) }}"
                                alt="{{ $item->name }}"
                                class="card-img-top"
                                style="height: 250px; object-fit: cover;">
                        </a>
                        <div class="card-body">
                            <h5>
                                <a href="{{ route('item.show', $item->id) }}"
                                    class="text-decoration-none text-dark">
                                    {{ $item->name }}
                                </a>
                            </h5>
                            <p class="text-muted">
                                Category: {{ $item->category->name ?? 'Uncategorized' }}
                            </p>
                            <p>{{ Str::limit($item->description, 70) }}</p>
                            <p class="fw-bold text-success">₦{{ number_format($item->price, 2) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-4">
                <p>No results found for "<strong>{{ $query }}</strong>"</p>
            </div>
            @endif
        </div>
    </section>

</x-app-layout>