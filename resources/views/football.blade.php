@extends('layouts.main')

@push('title')
<title> Football</title>
@endpush

@section('main-section')

<div class="bar">
  <div class="news-label">Football</div>
</div>



  <nav class="footballpage-nav">
    <ul>
      <li><a href="news">News</a></li>
      <li><a href="results">Results/Fixtures</a></li>
     
      <li><a href="footballtable">Tables</a></li>
    </ul>
  </nav>

  <main>
    <img src="images/football1.jpg" alt="Football Image" class="football-image">
    <p>Welcome to our football page! Explore the latest news, matches, and updates about your favorite football teams and players.</p>
    <p>Stay tuned for exciting content and in-depth analysis of the football world.</p>
  </main>



@endsection()