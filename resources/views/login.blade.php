<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/messages.css">
    
</head>
<body>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="container">
        <h1 class="text-center">Login</h1>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Enter Your Email" aria-describedby="emailHelp">
            @error('email')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password" aria-describedby="passwordHelp">
            @error('password')
            <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="remember-checkbox">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember Me</label>
        </div>

        <div class="login-button">
            <button class="btn btn-primary">Login</button>
        </div>
        <p class="signup-link">Don't have an account? <a href="/signup">Sign up</a></p>

        @if(session('error'))
        <div class="error-message">{{ session('error') }}</div>
        @endif
    </div>
</form>

</body>
</html>
