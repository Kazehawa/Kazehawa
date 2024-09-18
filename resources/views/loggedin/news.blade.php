<!doctype html>
<html lang="en">
  <head>
    <title>News</title>
    
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
                <a href="loggedinfootball">Football</a>
                <a href="#">Volleyball</a>
                <a href="#">Basketball</a>
                <a href="loggedinsports">More</a>
            </div>
        </div>
        <a class="menu-item" href="loggedinnews">News</a>
        <a class="menu-item" href="loggedinhighlights">Highlights</a>
        <a class="menu-item" href="loggedinresults">Result/Fixtures</a>
        <a class="menu-item" href="loggedinlivesrightnow">Lives Now</a>
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

<div class="bar">
  <div class="news-label">News</div>
</div>

<div class="news-container">
    @foreach ($news as $item)
        <div class="news-card">       
        <img src="{{ asset('uploads/thumbnails/'.$item->image) }}" alt="" class="newscard-image">          
            <div class="newscard-content">
                <h2 class="newscard-title">{{ $item->title }}</h2>
                <p class="newscard-description">{{ $item->description }}</p>
                <a href="{{ route('loggedinnewspage', ['id' => $item->id])}}" class="newscard-button">Read More</a>
                
            </div>
        </div> 
    @endforeach
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