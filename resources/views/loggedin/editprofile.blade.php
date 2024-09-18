<!doctype html>
<html lang="en">
<head>
   <title>User Edit Profile</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('css/header.css') }}">

    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link rel="stylesheet" href="{{ asset('css/messages.css') }}">


</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
                <h1 class="logo-name">Yokyo City</h1>
            </div>
            <div class="menu-container">
                <a class="menu-item" href="{{ route('loggedinhome') }}">Home</a>
                <div class="dropdown">
                    <a class="menu-item" href="{{ route('loggedinsports') }}">Sports</a>
                    <div class="dropdown-content">
                        <a href="{{ route('loggedinfootballpage') }}">Football</a>
                        <a href="#">Volleyball</a>
                        <a href="#">Basketball</a>
                        <a href="{{ route('loggedinsports') }}">More</a>
                    </div>
                </div>
                <a class="menu-item" href="{{ route('loggedinnews') }}">News</a>
                <a class="menu-item" href="{{ route('loggedinhighlights') }}">Highlights</a>
                <a class="menu-item" href="{{ route('loggedinresults') }}">Result/Fixtures</a>
                <a class="menu-item" href="loggedinlivesrightnow">Lives Now</a>
            </div>
            <div class="user-container">
                <a class="user-link" href="{{ route('loggedinprofile') }}">{{ Auth::user()->name }}</a>
                <a class="user-logout" href="{{ route('logout') }}">Logout</a>
            </div>
        </nav>
    </header>

    <div class="wrapper">
        <div class="content">
            <div class="vertical-menu">
                <a href="{{ route('loggedinprofile') }}">Profile</a>
                <a href="{{ route('loggedineditprofile') }}">Edit Profile</a>
                <a href="#">Settings</a>
                <a href="#">Help</a>
            </div>

            <div class="profile-container1">
                <div class="profile-header1">
                    <h1>Edit Profile</h1>
                </div>
                <div class="profile-content1">
                                    <form action="{{ route('loggedinprofileUpdate') }}" method="POST">
                            @csrf
                            @method('PUT')

                          
                            <!-- Display validation errors if any -->
                         
                            @if ($errors->any())
                                <div class="error-message">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif`

                            <div class="form-row">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" value="{{ $user->name }}" >
                            </div>
                            <div class="form-row">
                                <label for="sex">Sex</label>
                                <select id="sex" name="sex" required>
                                    <option value="male" {{ $user->sex === 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $user->sex === 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <div class="form-row">
                                <label for="country">Country</label>
                                <input type="text" id="country" name="country" value="{{ $user->country }}" >
                            </div>
                            <div class="form-row">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{ $user->email }}" >
                            </div>

                            <!-- Password fields -->
                            <div class="form-row">
                                <label for="current_password">Current Password</label>
                                <input type="password" id="current_password" name="current_password" required>
                            </div>
                            <div class="form-row">
                                <label for="new_password">New Password</label>
                                <input type="password" id="new_password" name="new_password" required>
                            </div>
                            <div class="form-row">
                                <label for="new_password_confirmation">Confirm New Password</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>
                            </div>

                            <!-- Submit button -->
                            <button type="submit">Update Profile</button>
                        </form>

                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <a class="foot" href="#">Contact</a>
        <a class="foot" href="#">Terms and Conditions</a>
        <a class="foot" href="#">Related Websites</a>
        <div class="rights">
            <h5>@Yokyo City Copyrights Reserved.</h5>
        </div>
    </footer>

    <script src="{{ asset('js/dropdown.js') }}"></script>
    <script src="{{ asset('js/slideshow.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
