<x-app-layout title="My Account">
<section class="account-page">
  <div class="mp-container account-wrap">
    <aside class="account-sidebar">
      <div class="profile-card">
        <div class="avatar">{{ strtoupper(substr($user->name ?? '',0,1) ?: 'U') }}</div>
        <div class="profile-info">
          <h3 id="acct-name">{{ $user->name ?? 'User' }}</h3>
          <p id="acct-email">{{ $user->email ?? '' }}</p>
        </div>
      </div>

      <nav class="account-nav">
        <a href="{{ route('account') }}" class="active">Overview</a>
        <a href="{{ route('cart.index') }}">My Cart</a>
        <a href="{{ route('item.wishlist') }}">Wishlist</a>
        <a href="{{ route('item.myItems') }}">My Items</a>
        <a href="{{ route('item.create') }}">Post Item</a>
      </nav>
    </aside>

    <main class="account-main">
      <header class="account-header">
        <h2>Account overview</h2>
        <button id="btn-logout" class="btn btn-ghost">Logout</button>
      </header>

      <section class="account-cards">
        <div class="card">
          <h4>Profile</h4>
          <p><strong>Name:</strong> <span id="profile-name">{{ $user->name ?? '—' }}</span></p>
          <p><strong>Email:</strong> <span id="profile-email">{{ $user->email ?? '—' }}</span></p>
        </div>

        <div class="card">
          <h4>Quick actions</h4>
          <p><a href="{{ route('cart.index') }}" class="btn-link">View Cart</a> • <a href="{{ route('item.wishlist') }}" class="btn-link">View Wishlist</a></p>
        </div>
      </section>
    </main>
  </div>
</section>

<style>
.account-wrap { display:flex; gap:24px; padding:28px 0; }
.account-sidebar { width:260px; }
.profile-card { display:flex; gap:12px; align-items:center; margin-bottom:16px; }
.avatar { width:56px; height:56px; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:20px; background:var(--mp-primary, #1f2937); color:#fff; }
.profile-info h3 { margin:0 0 4px 0; }
.account-nav a { display:block; padding:10px 8px; color:inherit; text-decoration:none; border-radius:8px; margin-bottom:6px; }
.account-nav a.active { background: rgba(0,0,0,0.06); }
.account-main { flex:1; }
.account-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; }
.account-cards { display:grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap:16px; }
.card { padding:16px; border-radius:10px; background: #fff; box-shadow: 0 6px 18px rgba(0,0,0,0.04); }
</style>

<script>
document.getElementById('btn-logout').addEventListener('click', function(e){
  e.preventDefault();
  const token = localStorage.getItem('jwt_token') || (document.cookie.match('(^|;)\s*' + 'jwt_token' + '\s*=\s*([^;]+)')?.pop());
  fetch("{{ route('api.logout') }}", {
    method: 'POST',
    headers: {
      "Accept": "application/json",
      "Content-Type": "application/json",
      "Authorization": token ? "Bearer " + token : "",
      "X-CSRF-TOKEN": "{{ csrf_token() }}"
    }
  }).finally(() => {
    localStorage.removeItem('jwt_token');
    document.cookie = 'jwt_token=; Max-Age=0; path=/';
    window.location.href = "{{ route('login') }}";
  });
});
</script>
</x-app-layout>
