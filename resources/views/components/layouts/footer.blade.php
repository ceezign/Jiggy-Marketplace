<footer class="mp-footer">
  <div class="mp-footer-container">
    <!-- Column 1: Logo + About -->
    <div class="mp-footer-col">
      <a href="{{ route('home') }}" class="mp-footer-logo">
        <svg xmlns="http://www.w3.org/2000/svg" class="mp-footer-logo-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path d="M12 2l9 4.5v11L12 22 3 17.5v-11L12 2z"/>
        </svg>
        <span>Jiggy-Marketplace</span>
      </a>
      <p class="mp-footer-text">
        Buy, sell, and discover great deals on cars, products, and more — all in one place.
      </p>
    </div>

    <!-- Column 2: Links -->
    <div class="mp-footer-col">
      <h4>Explore</h4>
      <ul>
        <li><a href="#">Shop</a></li>
        <li><a href="{{ route('cart.index')}}">Cart</a></li>
        <li><a href="#">About Us</a></li>
      </ul>
    </div>

    <!-- Column 3: Support -->
    <div class="mp-footer-col">
      <h4>Support</h4>
      <ul>
        <li><a href="#">Help Center</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Terms</a></li>
        <li><a href="#">Privacy</a></li>
      </ul>
    </div>

    <!-- Column 4: Newsletter -->
    <div class="mp-footer-col">
      <h4>Stay Updated</h4>
      <form class="mp-footer-form">
        <input type="email" placeholder="Enter your email" required>
        <button type="submit">Subscribe</button>
      </form>
    </div>
  </div>

  <div class="mp-footer-bottom">
    <p>&copy; {{ date('Y') }} Jiggy-Marketplace. All rights reserved.</p>
    <div class="mp-footer-socials">
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
  </div>
</footer>