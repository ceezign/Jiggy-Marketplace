<x-app-layout title="Login">

<section>
<div class="auth-container">
    <div class="auth-card">
        <h2 class="auth-title">Welcome Back</h2>

        {{-- Login Form --}}
        <form method="POST" action="{{ route('api.login') }}" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" value="" required autofocus>
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
            <a href="{{ route('api.login') }}">Sign up here</a>
        </p>
    </div>
</div>
</section>
</x-app-layout>
