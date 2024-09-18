<!doctype html>
<html lang="en">
  <head>
    <title>Watch Live</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/livevideo.css">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   
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
                <a href="">Volleyball</a>
                <a href="#">Basketball</a>
                <a href="loggedinsports">More</a>
            </div>
        </div>
        <a class="menu-item" href="loggedinnews">News</a>
        <a class="menu-item" href="loggedinhighlights">Highlights</a>
        <a class="menu-item" href="loggedinresults">Result/Fixtures</a>
        <a class="menu-item" href="loggedinwatchlive">Lives Now</a>
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


        <div class="bar">
          <div class="news-label">Watch Live</div>
        </div>
                  
                <div class="custom-video-player">
                <div class="live-icon"><ion-icon name="radio-outline"></ion-icon>Live</div>
                <video id="videoPlayer" autoplay>
                  <source src="{{ asset('uploads/highlights/'.$lives->video) }}" type="video/mp4">
                </video>
                <div class="controls">
                <button id="playBtn" onclick="togglePlayPause()"></button>
                <div id="progressBar" class="progress-bar"></div>
                <button id="fullscreenBtn" onclick="toggleFullscreen()"><ion-icon name="expand-outline"></ion-icon></button>
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


<script>
  
  
  var videoPlayer = document.getElementById('videoPlayer');
var fullscreenBtn = document.getElementById('fullscreenBtn');

function toggleFullscreen() {
  if (videoPlayer.requestFullscreen) {
    videoPlayer.requestFullscreen();
  } else if (videoPlayer.mozRequestFullScreen) { // Firefox
    videoPlayer.mozRequestFullScreen();
  } else if (videoPlayer.webkitRequestFullscreen) { // Chrome, Safari, Opera
    videoPlayer.webkitRequestFullscreen();
  } else if (videoPlayer.msRequestFullscreen) { // IE/Edge
    videoPlayer.msRequestFullscreen();
  }
}
</script>






<script src="js/dropdown.js"></script>
<script src="js/slideshow.js"></script>
<script src="js/search.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



  </body>
</html>
