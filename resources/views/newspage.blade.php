@extends('layouts.main')

@section('main-section')
@push('title')<title> Home</title>
@endpush
 
 
 <div class="full-news-container">
  <h2 class="full-news-title">Breaking News</h2>
  <img src="images/basket1.jpg" alt="News Image" class="full-news-image">
  <p class="full-news-content">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dapibus ligula sit amet finibus fermentum. Donec efficitur vestibulum arcu, eget bibendum lorem aliquet sed. Duis at condimentum magna. Nunc accumsan augue felis, sit amet hendrerit nisi efficitur id. Phasellus ut augue feugiat, tincidunt enim nec, tempor justo. Quisque cursus bibendum efficitur. Curabitur eu ex nec purus ultrices convallis. Proin dignissim est at posuere efficitur.
  </p>
  <a href="#" class="full-news-back-button">Back to News</a>
</div>


@endsection