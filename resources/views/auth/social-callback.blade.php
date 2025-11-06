<x-app-layout title="Signing you in...">
<section>
  <div class="auth-container">
    <div class="auth-card">
      <h2 class="auth-title">Signing you in...</h2>
      <p>Please wait — signing you in and redirecting.</p>
    </div>
  </div>
</section>

<script>
(function() {
  const params = new URLSearchParams(window.location.search);
  const token = params.get('token');

  if (!token) {
    window.location.href = "{{ route('login') }}";
    return;
  }

  localStorage.setItem('jwt_token', token);

  fetch("{{ route('api.user') }}", {
    method: 'GET',
    headers: { 'Authorization': 'Bearer ' + token, 'Accept': 'application/json' }
  }).finally(() => {
    window.location.href = "{{ route('home') }}";
  });
})();
</script>
</x-app-layout>
