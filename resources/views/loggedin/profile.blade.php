<!doctype html>
<html lang="en">
  <head>
    <title>User Profile</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/news.css">
    <link rel="stylesheet" href="css/highlights.css">
    <link rel="stylesheet" href="css/fixtures.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/sports.css">
    <link rel="stylesheet" href="css/football.css">
    <link rel="stylesheet" href="css/footballtable.css">
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/messages.css">



   
</head>
<body>
    <header>
    <nav class="navbar">
    <div class="logo-container">
        <img src="images/logo.png" alt="Logo" class="logo">
        <h1 class="logo-name">Yokyo City</h1>
    </div>
    <div class="menu-container">
        <a class="menu-item" href="loggedinhome">Home</a>
        <div class="dropdown">
            <a class="menu-item" href="loggedinsports">Sports</a>
            <div class="dropdown-content">
                <a href="loggedinfootballpage">Football</a>
                <a href="#">Volleyball</a>
                <a href="#">Basketball</a>
                <a href="loggedinsports">More</a>
            </div>
        </div>
        <a class="menu-item" href="loggedinnews">News</a>
        <a class="menu-item" href="loggedinhighlights">Highlights</a>
        <a class="menu-item" href="loggedinresults">Result/Fixtures</a>
        <a class="menu-item" href="lloggedinlivesrightnow">Lives Now</a>
    </div>
    <div class="user-container">
    @if(Auth::check())
        <a class="user-link" href="loggedinprofile">{{ Auth::user()->name }}</a>
        <a class="user-logout" href="{{ route('logout') }}">Logout</a>
    @else
        <div class="auth-container">
            <a class="auth-link" href="/login">Login</a>
            <a class="auth-link" href="/signup">Signup</a>
        </div>
    @endif
    </div>
</nav>

 
      </header>

<div class="wrapper">
  <div class="content">

          <div class="vertical-menu">
              <a href="loggedinprofile">Profile</a>
              <a href="loggedineditprofile">Edit Profile</a>
              <a href="#">Settings</a>
              <a href="#">Help</a>
          </div>

  <!-- Display any success or error messages here -->
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

          <div class="profile-container">
              <div class="profile-header">
                  <h1>Profile</h1>
              </div>
              <div class="profile-content">
                  <h2>Name: {{ $user->name }}</h2>
                  <p>Sex: {{ $user->sex }}</p>
                  <p>Country: {{ $user->country }}</p>
                  <p>Email: {{ $user->email }}</p>
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

    

</footer>




<script src="js/dropdown.js"></script>
<script src="js/slideshow.js"></script>
<script src="js/search.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



  </body>
</html>