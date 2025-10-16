<x-app-layout title="Home Page">
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to Jiggy-Marketplace</h1>
            <p>Buy and Sell anything, anywhere, anytime.</p>
            <form action="#" method="GET" class="search-form">
                <input type="text" name="q" placeholder="Search for items...">
                <button type="submit">Search</button>
            </form>
        </div>
    </section>

    <!-- Categories -->
    <section class="categories">
        <h2>Browse by Category</h2>
        <div class="category-grid">
            <div class="category-card">
                <img src="/images/electronics.png" alt="Electronics">
                <h3>Electronics</h3>
            </div>
            <div class="category-card">
                <img src="/images/fashion.png" alt="Fashion">
                <h3>Fashion</h3>
            </div>
            <div class="category-card">
                <img src="/images/cars.png" alt="Cars">
                <h3>Cars</h3>
            </div>
            <div class="category-card">
                <img src="/images/home.png" alt="Home">
                <h3>Home & Furniture</h3>
            </div>
        </div>
    </section>


    <!-- Featured Listings -->
    <section class="featured">
        <h2>Featured Listings</h2>
        <div class="featured-grid">
            @foreach($items as $item)
                <x-item :$item />
            <!-- <div class="featured-card">
                <img src="{{ $item->image }}" alt="{{ $item->title }}">
                <div class="card-body">
                    <h3>{{ $item->title }}</h3>
                    <p>{{ Str::limit($item->description, 60) }}</p>
                    <p class="price">${{ $item->price }}</p>
                    <a href="#" class="btn">View Details</a>
                </div>
            </div> -->
            @endforeach
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta">
        <h2>Start Selling Today</h2>
        <p>Turn your unused items into cash in just a few clicks.</p>
        <a href="#" class="btn-primary">Post an Ad</a>
    </section>


</x-app-layout>