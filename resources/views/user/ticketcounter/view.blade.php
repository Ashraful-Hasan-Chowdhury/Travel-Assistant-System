 @extends('user.home')
 @section('title', '- Ticket Counter Details')
    @section('userCounters', 'active')
@section('content')
	<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=869149773554446&autoLogAppEvents=1"></script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=869149773554446&autoLogAppEvents=1"></script>

<section class="ftco-section">

    	<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Ticket Counter Details</h2>
          </div>
        </div>
    	</div>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset($ticketcounter->image) }});">
    						
    					</a>
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
		    						<h3><a href="#">{{ $ticketcounter->name }}</a></h3>
		    						
	    						</div>
	    						{{-- <div class="two">
	    							<span class="price">$200</span>
    							</div>
 --}}    						</div>
    						<p> <span><h6>Transportation Type:</h6></span> {{ $ticketcounter->type }}</p>
                            <p> <span><h6>Description:</h6></span> {{ $ticketcounter->desciption }}</p>
    						<p id="app"><place-map :latval="{{ $ticketcounter->lat }}" :lngval="{{ $ticketcounter->lng }}"></place-map></p>
    						<hr>
    						<p> <span><h6>Direction to Visit:</h6></span> {{ $ticketcounter->direction }}</p>
                            <p> <span><h6>Phone:</h6></span> {{ $ticketcounter->phone }}</p>
    						<p class="bottom-area d-flex">
    							<span><div class="fb-like float-left" style="float:right" data-href="{{Request::url()}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div></span>
    							<span class="ml-auto float-right"><a href="{{ route('ticketcounters') }}" class=" btn btn-success btn-sm">Back</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			
    			
    			
    		</div>
    	</div>
    </section>  
@endsection