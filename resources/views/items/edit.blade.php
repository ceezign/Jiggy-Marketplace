<x-app-layout title="Edit Item">
  <div class="form-container">
    <h2 class="form-title">Edit Item</h2>

    <form action="{{ route('item.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="item-form">
      @csrf 
      @method('PUT')

      <div class="form-group">
        <label for="name">Item Name</label>
        <input 
          type="text" 
          id="name" 
          name="name" 
          value="{{ old('name', $item->name) }}" 
          placeholder="Enter item name" 
          required
        >
      </div>

      <div class="form-group">
        <label for="category_id">Category</label>
        <select id="category_id" name="category_id" required>
          <option value="" disabled>Select category</option>
          @foreach($categories as $category)
            <option 
              value="{{ $category->id }}" 
              {{ $item->category_id == $category->id ? 'selected' : '' }}
            >
              {{ $category->name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="price">Price (₦)</label>
        <input 
          type="number" 
          id="price" 
          name="price" 
          value="{{ old('price', $item->price) }}" 
          placeholder="Enter price" 
          required
        >
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4" placeholder="Write item description..." required>{{ old('description', $item->description) }}</textarea>
      </div>

      <div class="form-group">
        <label for="image">Upload Image (optional)</label>
        <input type="file" id="image" name="image" accept="image/*">
        @if($item->image)
          <div class="mt-3">
            <p>Current Image:</p>
            <img src="{{ asset('storage/' . $item->image) }}" width="120" alt="Item image">
          </div>
        @endif
      </div>

      <button type="submit" class="submit-btn">Update Item</button>
    </form>
  </div>
</x-app-layout>