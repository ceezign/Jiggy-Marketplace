<x-app-layout title="Login">

<section>
<div class="auth-container">
    <div class="auth-card">
        <h2 class="auth-title">Welcome Back</h2>

        {{-- Login Form --}}
        <form id="loginForm" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div class="form-group form-remember">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>

            <button type="submit" class="btn-auth">Login</button>
        </form>

        <div class="auth-divider">
            <span>or login with</span>
        </div>

        {{-- Social Auth Links --}}
        <div class="social-login">
            <a href="{{ url('auth/google') }}" class="btn-social google">Google</a>
            <a href="{{ url('auth/facebook') }}" class="btn-social facebook">Facebook</a>
            <a href="{{ url('auth/github') }}" class="btn-social github">GitHub</a>
        </div>

        <p class="auth-footer">
            Don’t have an account? 
            <a href="{{ route('signup') }}">Sign up here</a>
        </p>
    </div>
</div>
</section>
<script>
    document.getElementById('loginForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        const response = await fetch("{{ route('api.login') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF_TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ email, password })
        });

        const data = await response.json();

        if (response.ok) {
            localStorage.setItem("jwt_token", data.token);
            alert("Login Successful!");
            window.location.href = "{{ route('home') }}";
        } else {
            alert(data.error || "Login failed");
        }
    });
</script>
</x-app-layout>
