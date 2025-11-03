<x-app-layout  title="Signup">

<section>
<div class="auth-container">
    <div class="auth-card">
        <h2 class="auth-title">Create an Account</h2>

        <form id="signupForm" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input id="name" type="text" name="name" required autofocus>
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
            <a href="{{ route('login') }}">Login here</a>
        </p>
    </div>
</div>
</section>
<script>
    document.getElementById('signupForm').addEventListener('submit', async (e) => {
        e.preventDefault();

        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const password_confirmation = document.getElementById('password_confirmation').value;

        const response = await fetch("{{ route('api.register') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ name, email, password, password_confirmation })
        });

        const data = await response.json();

        if (response.ok) {
            localStorage.setItem("jwt_token", data.token);
            alert("Account Created Successfully");
            window.location.href = "{{ route('home') }}";
        } else {
            let msg = data.error || "Registration failed"
            if (data.errors) {
                msg = Object.values(data.errors).flat().join("\n");
            }
            alert(msg);
        }
    });
</script>
</x-app-layout>



