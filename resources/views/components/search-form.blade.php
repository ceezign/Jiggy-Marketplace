<section>
<div class="form-container">
    <h2 class="form-title">Post an Item</h2>
    <form action="/items/store" method="POST" enctype="multipart/form-data" class="item-form">
      <!-- Laravel CSRF Token -->
      @csrf 

      <div class="form-group">
        <label for="title">Item Title</label>
        <input type="text" id="title" name="title" placeholder="Enter item title" required>
      </div>

      <div class="form-group">
        <label for="category">Category</label>
        <select id="category" name="category" required>
          <option value="">-- Select Category --</option>
          <option value="clothes">Clothes</option>
          <option value="electronics">Electronics</option>
          <option value="books">Books</option>
          <option value="furniture">Furniture</option>
        </select>
      </div>

      <div class="form-group">
        <label for="price">Price (₦)</label>
        <input type="number" id="price" name="price" placeholder="Enter price" required>
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4" placeholder="Write item description..." required></textarea>
      </div>

      <div class="form-group">
        <label for="image">Upload Image</label>
        <input type="file" id="image" name="image" accept="image/*" required>
      </div>

      <button type="submit" class="submit-btn">Submit</button>
    </form>
  </div>
</section>
