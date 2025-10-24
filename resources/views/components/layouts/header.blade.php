<header class="mp-header">
  <div class="mp-container">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="mp-footer-logo">
        <svg xmlns="http://www.w3.org/2000/svg" class="mp-footer-logo-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path d="M12 2l9 4.5v11L12 22 3 17.5v-11L12 2z"/>
        </svg>
        <span>Jiggy-Marketplace</span>
      </a>

    <!-- Search (desktop only) -->
    <form class="mp-search" action="{{ route('item.search') }}" method="GET">
      <input type="text" name="q" placeholder="Search products..." required>
      <button type="submit">
        🔍
      </button>
    </form>

    <!-- Navigation -->
    <nav class="mp-nav">
      <a href="{{ route('item.index') }}">My Items</a>
      <!-- <a href="#">Shop</a> -->
      <a href="{{ route('cart.index') }}">Cart</a>
    </nav>

    <!-- Account -->
    <div class="mp-account">
      <button class="mp-account-btn">Register ▾</button>
      <div class="mp-account-menu" hidden>
        <a href="{{ route('signup') }}">Signup</a>
        <a href="{{ route('login') }}">Login</a>
      </div>
    </div>

    <div class="mp-account">
      <button class="mp-account-btn">My Account ▾</button>
      <div class="mp-account-menu" hidden>
        <a href="#">Profile</a>
        <a href="{{ route('cart.index') }}">Orders</a>
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
    <form class="mp-mobile-search" action="{{ route('item.search') }}" method="GET">
      <input type="text" name="q" placeholder="Search products..." required>
      <button type="submit">🔍</button>
    </form>
    <hr>
    <div class="mp-account">
      <button class="mp-account-btn">My Account ▾</button>
      <div class="mp-account-menu" hidden>
        <a href="#">Profile</a>
        <a href="{{ route('cart.index') }}">Orders</a>
        <a href="#">Logout</a>
      </div>
    </div>
    <a href="{{ route('login') }}">My Account</a>
    <a href="{{ route('signup') }}">Register</a>
    <a href="{{ route('item.index') }}">My Items</a>
    <!-- <a href="#">Shop</a> -->
    <a href="{{ route('cart.index') }}">Cart</a>
    <hr>
    <!-- <a href="#">Profile</a>
    <a href="{{ route('cart.index') }}">Orders</a>
    <a href="#">Logout</a> -->
  </div>


</header>

