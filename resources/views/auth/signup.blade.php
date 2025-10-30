<x-app-layout  title="Signup">

<section>
<div class="auth-container">
    <div class="auth-card">
        <h2 class="auth-title">Create an Account</h2>

        <form method="POST" action="{{ route('api.register') }}" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input id="name" type="text" name="name" value="" required autofocus>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" value="" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn-auth">Sign Up</button>
        </form>

        <div class="auth-divider">
            <span>or sign up with</span>
        </div>

        {{-- Social Auth Links --}}
        <div class="social-login">
            <a href="{{ url('auth/google') }}" class="btn-social google">Google</a>
            <a href="{{ url('auth/facebook') }}" class="btn-social facebook">Facebook</a>
            <a href="{{ url('auth/github') }}" class="btn-social github">GitHub</a>
        </div>

        <p class="auth-footer">
            Already have an account? 
            <a href="{{ route('api.login') }}">Login here</a>
        </p>
    </div>
</div>
</section>
</x-app-layout>



