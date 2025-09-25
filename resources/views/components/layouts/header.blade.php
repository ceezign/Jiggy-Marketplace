<header class="mp-header">
  <div class="mp-container">
    <!-- Logo -->
    <a href="/" class="mp-logo">
      <svg xmlns="http://www.w3.org/2000/svg" class="mp-logo-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path d="M12 2l9 4.5v11L12 22 3 17.5v-11L12 2z"/>
      </svg>
      <span class="mp-logo-text">Marketplace</span>
    </a>

    <!-- Search -->
    <form class="mp-search" action="#" method="GET">
      <input type="text" name="q" placeholder="Search products..." required>
      <button type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="8" cy="8" r="6"></circle>
          <line x1="14" y1="14" x2="20" y2="20"></line>
        </svg>
      </button>
    </form>

    <!-- Actions -->
    <nav class="mp-actions">
      <a href="#" class="mp-link">Cars</a>
      <a href="#" class="mp-link">Shop</a>
      <a href="#" class="mp-icon-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="9" cy="21" r="1"></circle>
          <circle cx="20" cy="21" r="1"></circle>
          <path d="M1 1h4l2.68 13.39a2 2 0 001.97 1.61h9.72a2 2 0 001.97-1.61L23 6H6"></path>
        </svg>
        <span class="mp-badge">3</span>
      </a>
      <button class="mp-hamburger" aria-label="Menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </button>
    </nav>
  </div>

  <!-- Mobile menu -->
  <div class="mp-mobile-menu" hidden>
    <a href="#">Cars</a>
    <a href="#">Shop</a>
    <a href="#">Cart</a>
  </div>
</header>