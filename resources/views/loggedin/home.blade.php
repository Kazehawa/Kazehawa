<!doctype html>
<html lang="en">
  <head>
    <title>Home</title>
    
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
    <link rel="stylesheet" href="/css/messages.css">




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">





   
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




  <div class="slideshow-container">
  <img class="slide" src="images/gymnasty1.jpg" alt="Slide 1" />
  <img class="slide" src="images/boxing1.jpg" alt="Slide 2" />
  <img class="slide" src="images/volley.jpg" alt="Slide 3" />
  <img class="slide" src="images/football2.jpg" alt="Slide 4" />
  <img class="slide" src="images/run2.jpg" alt="Slide 5" />
  <img class="slide" src="images/swim1.jpg" alt="Slide 6" />
  <img class="slide" src="images/weights.jpg" alt="Slide 7" />
 


    <div class="caption">
        @if(auth()->check())
          Welcome to Yokyo City {{ auth()->user()->name }}!

          @else
          Welcome to Yokyo City Live Broadcast!
          @endif 
      </div>

    </div>
    @if(session('success'))
    <div class="success-message">{{ session('success') }}</div>
    @endif




    <div class="bar">
  <div class="">News</div>
  <a class="news-label"href="loggedinnews">NEWS</a>
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

  

      <div class="bar">
      <a href="loggedinlivesrightnow"><div class="liveonyokyo-label">LIVE RIGHT NOW!</div></a>
      </div>


        
      <div class="yokyo-card">
            @foreach ($lives as $live)
                <div class="yokyo-thumbnail">
                <img src="{{ asset('uploads/thumbnails/'.$live->thumbnail) }}" alt="">
                    <div class="yokyo-overlay">
                        <h3 class="yokyo-title">{{ $live->title }}</h3>
                        <a class="yokyo-button" href="{{ route('loggedinwatchlive', ['id' => $live->id])}}">WATCH NOW!</a>
                    </div>
                </div>
              @endforeach
         </div>
       


      <div class="bar">
      <a class="highlight-label"href="loggedinhighlights">HIGHLIGHTS</a>
      </div>

      <div class="highlightcard-container">
          @foreach ($highlights as $highlight)
            <div class="hightlight-card">
            <div class="highlight-content">
                <!-- <video src="{{ asset('uploads/thumbnails/'.$highlight->video) }}"  controls autoplay></video> -->
              <img src="{{ asset('uploads/thumbnails/'.$highlight->thumbnail) }}" alt="">
                  <h2 class="hightlight-title">{{ $highlight->title }}</h2>
                  <p class="highlight-description">{{ $highlight->description }}</p>
                  <a href="{{ route('loggedinhighlightsmain', ['id' => $highlight->id])}}" class="highlight-link">Watch Video</a>
              </div>
          </div>
          @endforeach
        </div>

        <div class="bar">


          <a class="results-label"href="loggedinresults">RESULTS / FIXTURES</a>
        </div>


        <div class="fixtures-container">
            
              <div class="fixture">
                <div class="fixture-date">June 30, 2023</div>
                <div class="fixture-matchup">Team A vs Team B</div>
                <div class="fixture-info">
                  <div class="fixture-time">7:00 PM</div>
                  <div class="fixture-location">Stadium Name</div>
                </div>
              </div>
          

            
              <div class="fixture">
                <div class="fixture-date">June 30, 2023</div>
                <div class="fixture-matchup">Team A vs Team B</div>
                <div class="fixture-info">
                  <div class="fixture-time">7:00 PM</div>
                  <div class="fixture-location">Stadium Name</div>
                </div>
              </div>
            

            
              <div class="fixture">
                <div class="fixture-date">June 30, 2023</div>
                <div class="fixture-matchup">Team A vs Team B</div>
                <div class="fixture-info">
                  <div class="fixture-time">7:00 PM</div>
                  <div class="fixture-location">Stadium Name</div>
                </div>
              </div>
            
        </div>
          </div>


            <div class="bar">
            <a class="register-label"href="signup">REGISTER TO SUBSCRIBE!!</a>
          </div>


          <div class="advertisement-card">
            <img src="images/gymnasty1.jpg" alt="Subscription Image" class="subscription-image">
            <div class="advertisement-content">
              <h3>SURPRISE!</h3>
              <p>Subscribe Now to Unlock Premium Features! 
                <br>Watch Live-Olympic Games, 
                <br>Watch HIGHLIGHTS
                <br>At Only 12$ For a Whole Month.
                <br>
                OR,
                <br>
                GET STUCK HERE!
              </p>
              <a href="subscription">
                  <button class="subscribe-button">Subscribe Now!</button>
              </a>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>







  </body>
</html>