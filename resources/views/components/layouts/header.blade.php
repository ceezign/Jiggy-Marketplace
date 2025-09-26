<header class="mp-header">
  <div class="mp-container">
    <!-- Logo -->
    <a href="#" class="mp-logo">Marketplace</a>

    <!-- Search (desktop only) -->
    <form class="mp-search" action="#" method="GET">
      <input type="text" name="q" placeholder="Search products..." required>
      <button type="submit">
        🔍
      </button>
    </form>

    <!-- Navigation -->
    <nav class="mp-nav">
      <a href="#">Cars</a>
      <a href="#">Shop</a>
      <a href="#">Cart</a>
    </nav>

    <!-- Account -->
    <div class="mp-account">
      <button class="mp-account-btn">My Account ▾</button>
      <div class="mp-account-menu" hidden>
        <a href="#">Profile</a>
        <a href="#">Orders</a>
        <a href="#">Logout</a>
      </div>
    </div>

    <!-- Mobile Menu Button -->
    <button class="mp-hamburger" aria-label="Menu">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </button>
  </div>

  <!-- Mobile Dropdown -->
  <div class="mp-mobile-menu" hidden>
    <!-- Mobile Search -->
    <form class="mp-mobile-search" action="#" method="GET">
      <input type="text" name="q" placeholder="Search products..." required>
      <button type="submit">🔍</button>
    </form>
    <hr>
    <a href="#">Cars</a>
    <a href="#">Shop</a>
    <a href="#">Cart</a>
    <hr>
    <a href="#">Profile</a>
    <a href="#">Orders</a>
    <a href="#">Logout</a>
  </div>
</header>