@extends('user.home')
@section('title', '- Place Reviews')
@section('rev', 'active')
@section('content')
@if($revStatus == null)
<section class="ftco-section" >
	<section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Place Reviews</h2>
          </div>
        </div>
    	</div>
    	<div class="container mb-4"> 
    		<center><a href="{{ route('new.rivew') }}" class="btn btn-md btn-success">Write Review</a>
				<a href="{{ route('show.rivew',Auth::id()) }}" class="btn btn-md btn-success ml-2">My Reviews</a>
    		</center>	 
    	</div>
    	<div class="container-fluid">
            
    		<div class="row">
                @foreach ($reviews as $review)
                @if ($review->category == "place")
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="destination">
                        <a href="{{ route('read.review',$review->id) }}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset($review->image) }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-link"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <div class="d-flex">
                                <div class="one">
                                    <h3>{{ $review->users[0]->name }}</h3>
                                    <p class="rate" style="min-height: 70px;">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        @foreach ($review->places as $place)
                                            <a href="{{ route('review.by.places',$place->id) }}" class="h6"><span >{{ $place->pname }}</span></a>
                                        @endforeach
                                        
                                    </p>
                                </div>
                                
                            </div>
                            <p style="min-height: 50px;">{{ $review->title }}</p>
                            <p class="days"><span>{{$review->created_at->diffForHumans()}}</span></p>
                            <hr>
                            <p class="bottom-area d-flex">
                                {{-- <span><i class="icon-map-o"></i> </span> --}}
                                <span class="ml-auto"><a href="{{ route('read.review',$review->id) }}">Read More</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                @endif
    			@endforeach
    		</div>
            
            {{ $reviews->links() }}
    	</div>
    </section>
</section>
<section class="ftco-section" >
    <section class="ftco-section">
        <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Hotel Reviews</h2>
          </div>
        </div>
        </div>
        <div class="container mb-4"> 
            <center><a href="{{ route('new.rivew') }}" class="btn btn-md btn-success">Write Review</a>
                <a href="{{ route('show.rivew',Auth::id()) }}" class="btn btn-md btn-success ml-2">My Reviews</a>
            </center>    
        </div>
        <div class="container-fluid">
            
            <div class="row">
                @foreach ($reviews as $review)
                @if ($review->category == "hotel")
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="destination">
                        <a href="{{ route('read.review',$review->id) }}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset($review->image) }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-link"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <div class="d-flex">
                                <div class="one">
                                    <h3>{{ $review->users[0]->name }}</h3>
                                    <p class="rate" style="min-height: 70px;">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        @foreach ($review->hotels as $hotel)
                                            <a href="{{ route('review.by.hotels',$hotel->id) }}" class="h6"><span >{{ $hotel->hname }}</span></a>
                                        @endforeach
                                        
                                    </p>
                                </div>
                                
                            </div>
                            <p style="min-height: 50px;">{{ $review->title }}</p>
                            <p class="days"><span>{{$review->created_at->diffForHumans()}}</span></p>
                            <hr>
                            <p class="bottom-area d-flex">
                                {{-- <span><i class="icon-map-o"></i> </span> --}}
                                <span class="ml-auto"><a href="{{ route('read.review',$review->id) }}">Read More</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            
            {{ $reviews->links() }}
        </div>
    </section>
</section>

<section class="ftco-section" >
    <section class="ftco-section">
        <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Restaurant Reviews</h2>
          </div>
        </div>
        </div>
        <div class="container mb-4"> 
            <center><a href="{{ route('new.rivew') }}" class="btn btn-md btn-success">Write Review</a>
                <a href="{{ route('show.rivew',Auth::id()) }}" class="btn btn-md btn-success ml-2">My Reviews</a>
            </center>    
        </div>
        <div class="container-fluid">
            
            <div class="row">
                @foreach ($reviews as $review)
                @if ($review->category == "restaurant")
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="destination">
                        <a href="{{ route('read.review',$review->id) }}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset($review->image) }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-link"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <div class="d-flex">
                                <div class="one">
                                    <h3>{{ $review->users[0]->name }}</h3>
                                    <p class="rate" style="min-height: 70px;">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        @foreach ($review->restaurants as $restaurant)
                                            <a href="{{ route('review.by.restaurants',$restaurant->id) }}" class="h6"><span >{{ $restaurant->name }}</span></a>
                                        @endforeach
                                        
                                    </p>
                                </div>
                                
                            </div>
                            <p style="min-height: 50px;">{{ $review->title }}</p>
                            <p class="days"><span>{{$review->created_at->diffForHumans()}}</span></p>
                            <hr>
                            <p class="bottom-area d-flex">
                                {{-- <span><i class="icon-map-o"></i> </span> --}}
                                <span class="ml-auto"><a href="{{ route('read.review',$review->id) }}">Read More</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            
            {{ $reviews->links() }}
        </div>
    </section>
</section>

<section class="ftco-section" >
    <section class="ftco-section">
        <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Guide Reviews</h2>
          </div>
        </div>
        </div>
        <div class="container mb-4"> 
            <center><a href="{{ route('new.rivew') }}" class="btn btn-md btn-success">Write Review</a>
                <a href="{{ route('show.rivew',Auth::id()) }}" class="btn btn-md btn-success ml-2">My Reviews</a>
            </center>    
        </div>
        <div class="container-fluid">
            
            <div class="row">
                @foreach ($reviews as $review)
                @if ($review->category == "guide")
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="destination">
                        <a href="{{ route('read.review',$review->id) }}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset($review->image) }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-link"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <div class="d-flex">
                                <div class="one">
                                    <h3>{{ $review->users[0]->name }}</h3>
                                    <p class="rate" style="min-height: 70px;">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        @foreach ($review->guides as $guide)
                                            <a href="{{ route('review.by.guides',$guide->id) }}" class="h6"><span >{{ $guide->name }}</span></a>
                                        @endforeach
                                        
                                    </p>
                                </div>
                                
                            </div>
                            <p style="min-height: 50px;">{{ $review->title }}</p>
                            <p class="days"><span>{{$review->created_at->diffForHumans()}}</span></p>
                            <hr>
                            <p class="bottom-area d-flex">
                                {{-- <span><i class="icon-map-o"></i> </span> --}}
                                <span class="ml-auto"><a href="{{ route('read.review',$review->id) }}">Read More</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            
            {{ $reviews->links() }}
        </div>
    </section>
</section>
@endif


@if($revStatus != null)
@if($revStatus == 'place')
<section class="ftco-section" >
    <section class="ftco-section">
        <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Place Reviews</h2>
          </div>
        </div>
        </div>
        <div class="container mb-4"> 
            <center><a href="{{ route('new.rivew') }}" class="btn btn-md btn-success">Write Review</a>
                <a href="{{ route('show.rivew',Auth::id()) }}" class="btn btn-md btn-success ml-2">My Reviews</a>
            </center>    
        </div>
        <div class="container-fluid">
            
            <div class="row">
                @foreach ($reviews as $review)
                @if ($review->category == "place")
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="destination">
                        <a href="{{ route('read.review',$review->id) }}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset($review->image) }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-link"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <div class="d-flex">
                                <div class="one">
                                    <h3>{{ $review->users[0]->name }}</h3>
                                    <p class="rate" style="min-height: 70px;">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        @foreach ($review->places as $place)
                                            <a href="{{ route('review.by.places',$place->id) }}" class="h6"><span >{{ $place->pname }}</span></a>
                                        @endforeach
                                        
                                    </p>
                                </div>
                                
                            </div>
                            <p style="min-height: 50px;">{{ $review->title }}</p>
                            <p class="days"><span>{{$review->created_at->diffForHumans()}}</span></p>
                            <hr>
                            <p class="bottom-area d-flex">
                                {{-- <span><i class="icon-map-o"></i> </span> --}}
                                <span class="ml-auto"><a href="{{ route('read.review',$review->id) }}">Read More</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            
            {{ $reviews->links() }}
        </div>
    </section>
</section>
@endif
@if($revStatus == 'hotel')
<section class="ftco-section" >
    <section class="ftco-section">
        <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Hotel Reviews</h2>
          </div>
        </div>
        </div>
        <div class="container mb-4"> 
            <center><a href="{{ route('new.rivew') }}" class="btn btn-md btn-success">Write Review</a>
                <a href="{{ route('show.rivew',Auth::id()) }}" class="btn btn-md btn-success ml-2">My Reviews</a>
            </center>    
        </div>
        <div class="container-fluid">
            
            <div class="row">
                @foreach ($reviews as $review)
                @if ($review->category == "hotel")
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="destination">
                        <a href="{{ route('read.review',$review->id) }}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset($review->image) }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-link"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <div class="d-flex">
                                <div class="one">
                                    <h3>{{ $review->users[0]->name }}</h3>
                                    <p class="rate" style="min-height: 70px;">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        @foreach ($review->hotels as $hotel)
                                            <a href="{{ route('review.by.hotels',$hotel->id) }}" class="h6"><span >{{ $hotel->hname }}</span></a>
                                        @endforeach
                                        
                                    </p>
                                </div>
                                
                            </div>
                            <p style="min-height: 50px;">{{ $review->title }}</p>
                            <p class="days"><span>{{$review->created_at->diffForHumans()}}</span></p>
                            <hr>
                            <p class="bottom-area d-flex">
                                {{-- <span><i class="icon-map-o"></i> </span> --}}
                                <span class="ml-auto"><a href="{{ route('read.review',$review->id) }}">Read More</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            
            {{ $reviews->links() }}
        </div>
    </section>
</section>
@endif
@if($revStatus == 'restaurant')
<section class="ftco-section" >
    <section class="ftco-section">
        <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Restaurant Reviews</h2>
          </div>
        </div>
        </div>
        <div class="container mb-4"> 
            <center><a href="{{ route('new.rivew') }}" class="btn btn-md btn-success">Write Review</a>
                <a href="{{ route('show.rivew',Auth::id()) }}" class="btn btn-md btn-success ml-2">My Reviews</a>
            </center>    
        </div>
        <div class="container-fluid">
            
            <div class="row">
                @foreach ($reviews as $review)
                @if ($review->category == "restaurant")
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="destination">
                        <a href="{{ route('read.review',$review->id) }}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset($review->image) }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-link"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <div class="d-flex">
                                <div class="one">
                                    <h3>{{ $review->users[0]->name }}</h3>
                                    <p class="rate" style="min-height: 70px;">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        @foreach ($review->restaurants as $restaurant)
                                            <a href="{{ route('review.by.restaurants',$restaurant->id) }}" class="h6"><span >{{ $restaurant->name }}</span></a>
                                        @endforeach
                                        
                                    </p>
                                </div>
                                
                            </div>
                            <p style="min-height: 50px;">{{ $review->title }}</p>
                            <p class="days"><span>{{$review->created_at->diffForHumans()}}</span></p>
                            <hr>
                            <p class="bottom-area d-flex">
                                {{-- <span><i class="icon-map-o"></i> </span> --}}
                                <span class="ml-auto"><a href="{{ route('read.review',$review->id) }}">Read More</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            
            {{ $reviews->links() }}
        </div>
    </section>
</section>
@endif
@if($revStatus == 'guide')
<section class="ftco-section" >
    <section class="ftco-section">
        <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Guide Reviews</h2>
          </div>
        </div>
        </div>
        <div class="container mb-4"> 
            <center><a href="{{ route('new.rivew') }}" class="btn btn-md btn-success">Write Review</a>
                <a href="{{ route('show.rivew',Auth::id()) }}" class="btn btn-md btn-success ml-2">My Reviews</a>
            </center>    
        </div>
        <div class="container-fluid">
            
            <div class="row">
                @foreach ($reviews as $review)
                @if ($review->category == "guide")
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="destination">
                        <a href="{{ route('read.review',$review->id) }}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset($review->image) }});">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-link"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <div class="d-flex">
                                <div class="one">
                                    <h3>{{ $review->users[0]->name }}</h3>
                                    <p class="rate" style="min-height: 70px;">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        @foreach ($review->guides as $guide)
                                            <a href="{{ route('review.by.guides',$guide->id) }}" class="h6"><span >{{ $guide->name }}</span></a>
                                        @endforeach
                                        
                                    </p>
                                </div>
                                
                            </div>
                            <p style="min-height: 50px;">{{ $review->title }}</p>
                            <p class="days"><span>{{$review->created_at->diffForHumans()}}</span></p>
                            <hr>
                            <p class="bottom-area d-flex">
                                {{-- <span><i class="icon-map-o"></i> </span> --}}
                                <span class="ml-auto"><a href="{{ route('read.review',$review->id) }}">Read More</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            
            {{ $reviews->links() }}
        </div>
    </section>
</section>
@endif
@endif
@endsection