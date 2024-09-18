@extends('layouts.main')
@push('title')
<title> News</title>
@endpush
@section('main-section')

<div class="bar">
  <div class="news-label">News</div>
</div>


<div class="news-container">





    <div class="news-card"> 
        <img src="images/stadium.jpg" alt="News Image" class="newscard-image">
        <div class="newscard-content">
            <h2 class="newscard-title">Breaking News</h2>
            <p class="newscard-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dapibus ligula sit amet finibus fermentum. Donec efficitur vestibulum arcu, eget bibendum lorem aliquet sed.</p>
            <a href="/newspage" class="newscard-button">Read More</a>
        </div>
    </div>
    <div class="news-card"> 
        <img src="images/run1.jpg" alt="News Image" class="newscard-image">
        <div class="newscard-content">
            <h2 class="newscard-title">Breaking News</h2>
            <p class="newscard-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dapibus ligula sit amet finibus fermentum. Donec efficitur vestibulum arcu, eget bibendum lorem aliquet sed.</p>
            <a href="/newspage" class="newscard-button">Read More</a>
        </div>
    </div>
    <div class="news-card"> 
        <img src="  images/boxing2.jpg" alt="News Image" class="newscard-image">
        <div class="newscard-content">
            <h2 class="newscard-title">Breaking News</h2>
            <p class="newscard-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dapibus ligula sit amet finibus fermentum. Donec efficitur vestibulum arcu, eget bibendum lorem aliquet sed.</p>
            <a href="/newspage" class="newscard-button">Read More</a>
        </div>
    </div>
    <div class="news-card"> 
        <img src="images/boxing1.jpg" alt="News Image" class="newscard-image">
        <div class="newscard-content">
            <h2 class="newscard-title">Breaking News</h2>
            <p class="newscard-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dapibus ligula sit amet finibus fermentum. Donec efficitur vestibulum arcu, eget bibendum lorem aliquet sed.</p>
            <a href="/newspage" class="newscard-button">Read More</a>
        </div>
    </div>
    <div class="news-card"> 
        <img src="images/football1.jpg" alt="News Image" class="newscard-image">
        <div class="newscard-content">
            <h2 class="newscard-title">Breaking News</h2>
            <p class="newscard-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dapibus ligula sit amet finibus fermentum. Donec efficitur vestibulum arcu, eget bibendum lorem aliquet sed.</p>
            <a href="/newspage" class="newscard-button">Read More</a>
        </div>
    </div>
    
    
  
    
    






    
   
  
</div>

@endsection()