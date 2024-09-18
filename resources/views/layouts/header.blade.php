<!doctype html>
<html lang="en">
  <head>
    @stack('title')
    
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
    <link rel="stylesheet" href="css/newspage.css">



   
</head>
<body>
    <header>
    <nav class="navbar">
    <div class="logo-container">
        <img src="images/logo.png" alt="Logo" class="logo">
        <h1 class="logo-name">Yokyo City</h1>
    </div>
    <div class="menu-container">
        <a class="menu-item" href="/">Home</a>
        <div class="dropdown">
            <a class="menu-item" href="/sports">Sports</a>
            <div class="dropdown-content">
                <a href="football">Football</a>
                <a href="#">Volleyball</a>
                <a href="#">Basketball</a>
                <a href="sports">More</a>
            </div>
        </div>
        <a class="menu-item" href="/news">News</a>
        <a class="menu-item" href="/highlights">Highlights</a>
        <a class="menu-item" href="/results">Result/Fixtures</a>
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

<div class="search-container">
  <form action="">
    <label for="search-bar" class="search-label">Search</label>
    <div class="search-bar">
      <input type="search" id="search-bar" placeholder="Type here..">
     <button type="submit" class="search-btn"> Go
      </button>
    </div>
  </form>
</div>

        
  

 
      </header>

<div class="wrapper">
  <div class="content">
  
  
  
  
  