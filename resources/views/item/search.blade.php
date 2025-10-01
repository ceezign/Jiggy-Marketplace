<x-app-layout>
    <section>
    <div class="search-advanced-wrapper">
    <form action="#" method="GET" class="search-advanced-form">

        <!-- Keyword -->
        <div class="form-group">
            <label for="query">Keyword</label>
            <input type="text" id="query" name="query" placeholder="Search by item name...">
        </div>

        <!-- Category -->
        <div class="form-group">
            <label for="category">Category</label>
            <select id="category" name="category">
                <option value="">All Categories</option>
                <option value="electronics">Electronics</option>
                <option value="fashion">Fashion</option>
                <option value="home">Home & Living</option>
                <option value="sports">Sports</option>
                <option value="others">Others</option>
            </select>
        </div>

        <!-- Price Range -->
        <div class="form-group two-column">
            <div>
                <label for="min_price">Min Price (₦)</label>
                <input type="number" id="min_price" name="min_price" placeholder="e.g. 5000">
            </div>
            <div>
                <label for="max_price">Max Price (₦)</label>
                <input type="number" id="max_price" name="max_price" placeholder="e.g. 200000">
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="search-btn">🔍 Search</button>
    </form>
</div>
</section>
</x-app-layout>
