@extends('layouts.main')

@push('title')
<title> Sports</title>
@endpush
@section('main-section')

<div class="bar">
  <div class="news-label">Sports</div>
</div>


<div class="sportscard-container">


                <a href="/football">
                  <div class="sportscard">
                    <img src="images/football4.jpg" alt="Image 1">
                    <div class="sportscard-footer">
                      <span class="sportscardname">Football</span>
                    </div>
                  </div>
                </a>



              <a href="/football">

                <div class="sportscard">
                  <img src="images/volley.jpg" alt="Image 1">
                  <div class="sportscard-footer">
                    <span class="sportscardname">Volleyball</span>
                  </div>
                </div>
              </a>

              <a href="/football">
              <div class="sportscard">
                  <img src="images/basket1.jpg" alt="Image 1">
                  <div class="sportscard-footer">
                    <span class="sportscardname">Basketball</span>
                  </div>
              </div>
              
              </a>

              <a href="/football">
              <div class="sportscard">
                  <img src="images/boxing1.jpg" alt="Image 1">
                  <div class="sportscard-footer">
                    <span class="sportscardname">Boxing</span>
                  </div>
                </div>
              </a>

              <a href="/football">
              <div class="sportscard">
                  <img src="images/gymnasty1.jpg" alt="Image 1">
                  <div class="sportscard-footer">
                    <span class="sportscardname">Gymnastics</span>
                  </div>
                </div>
              </a>


              <a href="/football">
              <div class="sportscard">
                  <img src="images/run2.jpg" alt="Image 1">
                  <div class="sportscard-footer">
                    <span class="sportscardname">Race</span>
                  </div>
                </div>
              </a>

              <a href="/football">
              <div class="sportscard">
                  <img src="images/swim1.jpg" alt="Image 1">
                  <div class="sportscard-footer">
                    <span class="sportscardname">Swimming</span>
                  </div>
                </div>
              </a>

              <a href="/football">
              <div class="sportscard">
                  <img src="images/weights.jpg" alt="Image 1">
                  <div class="sportscard-footer">
                    <span class="sportscardname">Weight Lifting</span>
                  </div>
                </div>
              </a>

              <a href="/football">
              <div class="sportscard">
                  <img src="images/badminton2.jpg" alt="Image 1">
                  <div class="sportscard-footer">
                    <span class="sportscardname">Badminton</span>
                  </div>
                </div>
              </a>

              <a href="/football">
              <div class="sportscard">
                  <img src="images/archery1.jpg" alt="Image 1">
                  <div class="sportscard-footer">
                    <span class="sportscardname">Archery</span>
                  </div>
                </div>
              </a>

</div>

  

@endsection()