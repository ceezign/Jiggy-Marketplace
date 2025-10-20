<x-app-layout title="Item Create">

    <section>
        <div class="item-create-wrapper">
            <div class="item-create-card">
                <h2 class="page-title">Post a New Item</h2>
                <p class="subtitle">Fill in the details below to add your item to the marketplace.</p>

                <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="create-form">
                    @csrf

                    <div class="form-group">
                        <label for="title">Item Name <span class="required">*</span></label>
                        <input type="text" id="title" name="name" placeholder="e.g. iPhone 14 Pro" required>
                    </div>

                    <div class="form-group">
                        <label for="category">Category <span class="required">*</span></label>
                        <select id="category" name="category" required>
                            <option value="" disabled selected>Select category</option>
                            <option value="electronics">Electronics</option>
                            <option value="fashion">Fashion</option>
                            <option value="home">Home & Living</option>
                            <option value="sports">Sports</option>
                            <option value="others">Others</option>
                        </select>
                    </div>

                    <div class="form-group two-column">
                        <div>
                            <label for="price">Price (₦) <span class="required">*</span></label>
                            <input type="number" id="price" name="price" placeholder="150000" required>
                        </div>
                        <div>
                            <label for="image">Upload Image</label>
                            <input type="file" id="image" name="image" accept="image/*">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description <span class="required">*</span></label>
                        <textarea id="description" name="description" rows="5" placeholder="Describe your item (condition, features, etc.)" required></textarea>
                    </div>

                    <button type="submit" class="btn-submit">Post Item</button>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>