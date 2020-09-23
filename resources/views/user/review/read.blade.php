@extends('user.home')
@section('title', '- Read Review')
@section('rev', 'active')
@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=869149773554446&autoLogAppEvents=1"></script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=869149773554446&autoLogAppEvents=1"></script>
<section class="ftco-section" >
  <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Read Review</h2>
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-sm col-md-6 col-lg ftco-animate">
            <div class="destination">
             {{--  <a href="{{ route('read.review',$review->id) }}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset($review->image) }});">
                <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-link"></span>
                </div>
              </a> --}}
              <img src="{{ asset($review->image) }}" alt="" style="width:500px; height: 400px;">
              <div class="text p-3">
                <div class="d-flex">
                  <div class="one">
                    <h2>{{ $review->title }}</h2>
                    <h5>{{ $review->subtitle }}</h5>
                    <hr>
                    <p>
                      <span class="h5"><i class="fa fa-user" aria-hidden="true"></i> {{ $review->users[0]->name }}</span> <small> {{$review->created_at->diffForHumans()}}</small>
                        
                    </p>
                    <p class="rate">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        @if ($review->category == "place")                    
                                        @foreach ($review->places as $place)
                                            <a href="{{ route('review.by.places',$place->id) }}" class="h5"><span >{{ $place->pname }}</span></a>
                                        @endforeach
                                        @endif
                                        @if ($review->category == "hotel")                    
                                        @foreach ($review->hotels as $hotel)
                                            <a href="{{ route('review.by.hotels',$hotel->id) }}" class="h5"><span >{{ $hotel->hname }}</span></a>
                                        @endforeach
                                        @endif
                                        @if ($review->category == "restaurant")                    
                                        @foreach ($review->restaurants as $restaurant)
                                            <a href="{{ route('review.by.restaurants',$restaurant->id) }}" class="h5"><span >{{ $restaurant->name }}</span></a>
                                        @endforeach
                                        @endif
                                        @if ($review->category == "guide")                    
                                        @foreach ($review->guides as $guide)
                                            <a href="{{ route('review.by.guides',$guide->id) }}" class="h5"><span >{{ $guide->address }}</span></a>
                                        @endforeach
                                        @endif
                      
                    </p>
                  </div>
                  
                </div>
                <p >{!!htmlspecialchars_decode($review->body)!!}</p>
                <hr>
                <p class="bottom-area d-flex">
                   <div class="fb-like"  data-href="{{Request::url()}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>

        <div class="fb-comments" style="float:left;margin-top:50px;background:#f5f5ef; border-radius:5px;border:1px solid gray;padding:5px;width:100%;margin-bottom:30px;" data-href="{{Request::url()}}" data-numposts="10" data-width=""></div>
                  {{-- <span><i class="icon-map-o"></i> </span> --}}
                  {{-- <span class="ml-auto"><a href="{{ route('read.review',$review->id) }}">Read More</a></span> --}}
                </p>
              </div>
            </div>
          </div>
          
        </div>
      
    </section>
</section>
@endsection