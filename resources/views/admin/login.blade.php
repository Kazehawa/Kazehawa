<!doctype html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/messages.css">
</head>
<body>
    <form method="POST" action="{{ route('adminlogin') }}">
        @csrf
        <div class="container">
            <h1 class="text-center">Admin Login</h1>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control" value="{{ old('email') }}" placeholder="Enter Your Email" aria-describedby="helpId">
                @error('email')
                <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control" placeholder="Enter Your Password" aria-describedby="helpId">
                @error('password')
                <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="login-button">
                <button class="btn btn-primary">Login</button>
    </form>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
</body>
</html>
