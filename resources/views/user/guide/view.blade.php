 @extends('user.home')
 @section('title', '- Guide Details')
@section('userGuide', 'active')
@section('content')
	<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=869149773554446&autoLogAppEvents=1"></script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=869149773554446&autoLogAppEvents=1"></script>

<section class="ftco-section">

    	<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Guide Details</h2>
          </div>
        </div>
    	</div>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
    					{{-- <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset($guide->image) }});">
    					</a>
 --}}                        <img src="{{ asset($guide->image) }}" alt="" style="width: 400px;height: 500px;">
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
		    						<h3><a href="#">{{ $guide->name }}</a></h3>	
	    						</div>
	    						{{-- <div class="two">
	    							<span class="price">$200</span>
    							</div>
 --}}    						</div>
                            <p> <span><h6>Description:</h6></span> {{ $guide->description }}</p>
    						<p id="app"><place-map :latval="{{ $guide->lat }}" :lngval="{{ $guide->lng }}"></place-map></p>
    						<hr>
    						<p> <span><h6>Address:</h6></span> {{ $guide->address }}</p>
                            <p> <span><h6>Phone:</h6></span> {{ $guide->phone }}</p>
    						<p class="bottom-area d-flex">
    							<span><div class="fb-like float-left" style="float:right" data-href="{{Request::url()}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div></span>
    							<span class="ml-auto float-right"><a href="{{ route('guides') }}" class=" btn btn-success btn-sm">Back</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			
    			
    			
    		</div>
    	</div>
    </section>  

    <section class="ftco-section" >
        <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Reviews of This Guide</h2>
          </div>
        </div>
        </div>
        <div class="container-fluid">
            
            <div class="row">
                @foreach ($reviews as $review)
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
                @endforeach
            </div>
            
            {{ $reviews->links() }}
        </div>
    
</section>
@endsection