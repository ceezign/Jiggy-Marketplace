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
    </form><header class="mp-header">
  <div class="mp-container mp-header-inner">
    <a href="{{ route('home') }}" class="mp-footer-logo">
      <svg xmlns="http://www.w3.org/2000/svg" class="mp-footer-logo-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path d="M12 2l9 4.5v11L12 22 3 17.5v-11L12 2z"/>
      </svg>
      <span>Jiggy-Marketplace</span>
    </a>

    <div class="mp-search-wrapper">
      <form class="mp-search" action="{{ route('item.search') }}" method="GET">
        <input type="text" name="q" placeholder="Search products..." required>
        <button type="submit" aria-label="Search">🔍</button>
      </form>
    </div>

    <nav class="mp-nav desktop-only" aria-label="Main navigation">
      <a href="{{ route('home') }}">Home</a>
      <a href="{{ route('item.index') }}">Shop</a>
      <a href="{{ route('item.index') }}">Items</a>
      <a id="nav-wishlist" href="{{ route('item.wishlist') }}">Wishlist</a>
      <a id="nav-cart" href="{{ route('cart.index') }}">Cart</a>
    </nav>

    <div class="mp-actions">
      <div id="auth-links" class="auth-links">
        <a id="show-login" class="btn btn-ghost" href="{{ route('login') }}">Login</a>
        <a id="show-signup" class="btn btn-primary" href="{{ route('signup') }}">Signup</a>
      </div>

      <div id="account-menu" class="account-menu" style="display:none;">
        <button class="account-toggle">
          <span id="account-name">Account</span> ▾
        </button>
        <div class="account-dropdown" id="account-dropdown" hidden>
          <a href="{{ route('account') }}">Profile</a>
          <a href="{{ route('cart.index') }}">Orders</a>
          <a href="#" id="logout-btn">Logout</a>
        </div>
      </div>

      <button class="mp-hamburger mobile-only" aria-label="Menu" id="mobileToggle">
        <span class="bar"></span><span class="bar"></span><span class="bar"></span>
      </button>
    </div>
  </div>

  <div id="mobileMenu" class="mp-mobile-menu" hidden>
    <form class="mp-mobile-search" action="{{ route('item.search') }}" method="GET">
      <input type="text" name="q" placeholder="Search products..." required>
      <button type="submit">🔍</button>
    </form>

    <nav class="mp-nav-mobile">
      <a href="{{ route('home') }}">Home</a>
      <a href="{{ route('item.index') }}">Shop</a>
      <a id="m-wishlist" href="{{ route('item.wishlist') }}">Wishlist</a>
      <a id="m-cart" href="{{ route('cart.index') }}">Cart</a>
      <div id="mobile-auth-area">
        <a id="m-login" href="{{ route('login') }}">Login</a>
        <a id="m-signup" href="{{ route('signup') }}">Signup</a>
      </div>
    </nav>
  </div>

  <style>
    .mp-header { background: var(--mp-bg, #fff); border-bottom: 1px solid rgba(0,0,0,0.06); }
    .mp-header-inner { display:flex; align-items:center; gap:16px; justify-content:space-between; padding:12px 20px; }
    .mp-search { display:flex; gap:6px; align-items:center; }
    .mp-nav a { margin:0 10px; text-decoration:none; }
    .mp-actions { display:flex; align-items:center; gap:10px; }
    .mobile-only { display:none; }
    .desktop-only { display:flex; }
    @media (max-width:900px) {
      .desktop-only { display:none; }
      .mobile-only { display:block; }
    }
    .account-dropdown { position:absolute; background:white; box-shadow:0 8px 24px rgba(0,0,0,0.08); border-radius:6px; padding:8px; right:16px; top:56px; }
    .account-dropdown a { display:block; padding:8px 12px; }
  </style>

  <script>
    (function(){
      const authLinks = document.getElementById('auth-links');
      const accountMenu = document.getElementById('account-menu');
      const accountName = document.getElementById('account-name');
      const logoutBtn = document.getElementById('logout-btn');
      const mobileAuthArea = document.getElementById('mobile-auth-area');
      const mobileToggle = document.getElementById('mobileToggle');
      const mobileMenu = document.getElementById('mobileMenu');

      function showLoggedOut() {
        authLinks.style.display = 'flex';
        accountMenu.style.display = 'none';
        if (mobileAuthArea) {
          mobileAuthArea.innerHTML = `<a id="m-login" href="{{ route('login') }}">Login</a>
                                      <a id="m-signup" href="{{ route('signup') }}">Signup</a>`;
        }
      }

      function showLoggedIn(name) {
        authLinks.style.display = 'none';
        accountMenu.style.display = 'block';
        accountName.textContent = name || 'My Account';
        if (mobileAuthArea) {
          mobileAuthArea.innerHTML = `<a href="{{ route('account') }}">Profile</a>
                                      <a id="m-logout" href="#">Logout</a>`;
          document.getElementById('m-logout').addEventListener('click', function(e){ e.preventDefault(); logout(); });
        }
      }

      async function checkAuth() {
        const token = localStorage.getItem('jwt_token') || (document.cookie.match('(^|;)\s*' + 'jwt_token' + '\s*=\s*([^;]+)')?.pop());
        if (!token) {
          showLoggedOut();
          return;
        }
        try {
          const res = await fetch("{{ route('api.user') }}", {
            headers: { "Authorization": "Bearer " + token, "Accept": "application/json" }
          });
          if (!res.ok) throw new Error('not auth');
          const user = await res.json();
          showLoggedIn(user.name || user.email || 'Account');
        } catch (e) {
          localStorage.removeItem('jwt_token');
          document.cookie = 'jwt_token=; Max-Age=0; path=/';
          showLoggedOut();
        }
      }

      async function logout() {
        const token = localStorage.getItem('jwt_token') || (document.cookie.match('(^|;)\s*' + 'jwt_token' + '\s*=\s*([^;]+)')?.pop());
        try {
          if (token) {
            await fetch("{{ route('api.logout') }}", {
              method: 'POST',
              headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "Authorization": "Bearer " + token,
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
              }
            });
          }
        } catch (e) {}
        localStorage.removeItem('jwt_token');
        document.cookie = 'jwt_token=; Max-Age=0; path=/';
        window.location.href = "{{ route('login') }}";
      }

      if (logoutBtn) logoutBtn.addEventListener('click', function(e){ e.preventDefault(); logout(); });
      if (mobileToggle && mobileMenu) mobileToggle.addEventListener('click', function(){ mobileMenu.hidden = !mobileMenu.hidden; });
      document.addEventListener('DOMContentLoaded', checkAuth);
    })();
  </script>

</header>


    <!-- Navigation -->
    <nav class="mp-nav">
      <a href="{{ route('item.index') }}">My Items</a>
      <a href="{{ route('cart.index') }}">Cart</a>
      <a href="{{ route('item.wishlist')}}">Wishlists</a>
      
      
    </nav>

    <!-- Account -->
    <div class="mp-account">
      <button class="mp-account-btn">Join Now ▾</button>
      <div class="mp-account-menu" hidden>
        <a href="{{ route('signup') }}">Signup</a>
        <a href="{{ route('login') }}">Login</a>
      </div>
    </div>

    <div class="mp-account">
      <button class="mp-account-btn">My Account ▾</button>
      <div class="mp-account-menu" hidden>
        <a href="{{ route('cart.index') }}">Orders</a>
        <a href="#" onclick="logoutUser()">Logout</a>
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
        <a href="#" onclick="logoutUser()">Logout</a>
      </div>
    </div>
    <a href="#">My Account</a>
    <a href="{{ route('signup') }}">Register</a>
    <a href="{{ route('item.index') }}">My Items</a>
    <a href="{{ route('cart.index') }}">Cart</a>
    <a href="{{ route('item.wishlist')}}">Wishlists</a>
    <a href="#" onclick="logoutUser()">Logout</a>
    
    <hr>
    <!-- <a href="#">Profile</a>
    <a href="{{ route('cart.index') }}">Orders</a>
    <a href="#">Logout</a> -->
  </div>




<script>
(function(){
  const registerLinkHtml = `<a id="nav-register" href="{{ route('signup') }}">Signup</a>`;
  const loginLinkHtml = `<a id="nav-login" href="{{ route('login') }}">Login</a>`;
  // create a logged-in menu node
  const loggedInMenuHtml = `
    <div id="logged-in-menu" style="display:none;">
      <button class="mp-account-btn">My Account ▾</button>
      <div class="mp-account-menu" hidden>
        <a href="{{ route('account') }}">Profile</a>
        <a href="{{ route('cart.index') }}">Orders</a>
        <a href="#" id="btnLogout">Logout</a>
      </div>
    </div>
  `;

  function setLoggedInUI(isLoggedIn) {
    // desktop first mp-account (Join Now) shows register/login links
    const joinNow = document.querySelector('.mp-account');
    // We will hide the first mp-account (join) and show loggedInMenu
    // For robust approach, insert loggedInMenu into DOM if not present
    let container = document.getElementById('auth-area');
    if (!container) {
      container = document.createElement('div');
      container.id = 'auth-area';
      // insert before first mp-hamburger
      const mpContainer = document.querySelector('.mp-container');
      mpContainer.insertBefore(container, document.querySelector('.mp-hamburger'));
    }
    // ensure content
    container.innerHTML = isLoggedIn ? loggedInMenuHtml : (registerLinkHtml + loginLinkHtml);

    // also fill mobile menu register/login points
    const mobile = document.querySelector('.mp-mobile-menu');
    if (mobile) {
      const reg = mobile.querySelector('a[href="{{ route("signup") }}"]');

      if (!isLoggedIn) {
        if (!reg) {
          mobile.insertAdjacentHTML('beforeend', `<a href="{{ route('signup') }}">Register</a>`);
        }
      } else {
        // remove register/login from mobile
        mobile.querySelectorAll('a').forEach(a=>{
          if (a.getAttribute('href') === "{{ route('signup') }}" || a.getAttribute('href') === "{{ route('login') }}") {
            a.remove();
          }
        });
      }
    }
  }

  async function checkAuth() {
    const token = localStorage.getItem('jwt_token');
    if (!token) {
      setLoggedInUI(false);
      return;
    }
    try {
      const res = await fetch("{{ route('api.user') }}", {
        headers: { "Authorization": "Bearer " + token, "Accept": "application/json" }
      });
      if (!res.ok) throw new Error('not auth');
      setLoggedInUI(true);
    } catch (e) {
      localStorage.removeItem('jwt_token');
      setLoggedInUI(false);
    }
  }

  window.logoutUser = async function() {
    const token = localStorage.getItem('jwt_token');
    if (!token) {
      window.location.href = "{{ route('login') }}";
      return;
    }
    try {
      await fetch("{{ route('api.logout') }}", {
        method: "POST",
        headers: {
          "Authorization": "Bearer " + token,
          "Accept": "application/json",
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }
      });
    } catch (e) {
      // ignore
    } finally {
      localStorage.removeItem('jwt_token');
      window.location.href = "{{ route('login') }}";
    }
  };

  // delegate click for logout button
  document.addEventListener('click', function(e){
    if (e.target && e.target.id === 'btnLogout'){
      e.preventDefault();
      logoutUser();
    }
  });

  // run on DOMContentLoaded
  document.addEventListener('DOMContentLoaded', checkAuth);
})();
</script>

</header>

