


<x-app-layout title="Item Create">

    <section>
        <div class="item-create-wrapper">
            <div class="item-create-card">
                <h2 class="page-title">Post a New Item</h2>
                <p class="subtitle">Fill in the details below to add your item to the marketplace.</p>

                {{--  Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success" style="background: #d1e7dd; color: #0f5132; padding: 10px 15px; border-radius: 6px; margin-bottom: 15px; border: 1px solid #badbcc;">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- ❌ Error Messages --}}
                @if($errors->any())
                    <div class="alert alert-danger" style="background: #f8d7da; color: #842029; padding: 10px 15px; border-radius: 6px; margin-bottom: 15px; border: 1px solid #f5c2c7;">
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data" class="create-form">
                    @csrf

                    
                    <div class="form-group">
                        <label for="title">Item Name <span class="required">*</span></label>
                        <input type="text" id="title" name="name" placeholder="e.g. iPhone 14 Pro" value="{{ old('name') }}" required>
                    </div>

                    
                    <div class="form-group">
                        <label for="category">Category <span class="required">*</span></label>
                        <select id="category" name="category_id" required>
                            <option value="" disabled selected>Select category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    
                    <div class="form-group two-column">
                        <div>
                            <label for="price">Price (₦) <span class="required">*</span></label>
                            <input type="number" id="price" name="price" placeholder="150000" value="{{ old('price') }}" required>
                        </div>
                        <div>
                            <label for="image">Upload Image</label>
                            <input type="file" id="image" name="image" accept="image/*">
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label for="description">Description <span class="required">*</span></label>
                        <textarea id="description" name="description" rows="5" placeholder="Describe your item (condition, features, etc.)" required>{{ old('description') }}</textarea>
                    </div>

                    
                    <button type="submit" class="btn-submit">Post Item</button>
                </form>
            </div>
        </div>
    </section>

</x-app-layout>