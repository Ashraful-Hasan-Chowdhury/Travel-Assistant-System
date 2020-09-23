@extends('user.home')
@section('title', '- Hotel Details')
@section('hotl', 'active')
@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=869149773554446&autoLogAppEvents=1"></script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=869149773554446&autoLogAppEvents=1"></script>

<section class="ftco-section" >

    	<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Hotel Details</h2>
          </div>
        </div>
    	</div>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset($hotel->image) }});">
    						
    					</a>
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
		    						<h3><a href="#">{{ $hotel->hname }}</a></h3>
		    						
	    						</div>
	    						{{-- <div class="two">
	    							<span class="price">$200</span>
    							</div>
 --}}    						</div>
    						<p> <span><h6>Description:</h6></span> {{ $hotel->desciption }}</p>
    						<p id="app"><place-map :latval="{{ $hotel->lat }}" :lngval="{{ $hotel->lng }}"></place-map></p>
    						<hr>
    						<p> <span><h6>Direction to Visit:</h6></span> {{ $hotel->direction }}</p>
    						<p class="bottom-area d-flex">
    							{{-- <span><div class="fb-like float-left" style="float:right" data-href="{{Request::url()}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div></span> --}}
    							{{-- <span class="ml-auto float-right"><a href="{{ route('hotels') }}" class=" btn btn-success btn-sm">Back</a></span> --}}
    						</p>
    					</div>
    				</div>
    			</div>
    			
    			
    			
    		</div>
    	</div>

        <section >

        <div class="container">
                <div class="row justify-content-center m-1 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Hotel Rooms</h2>
          </div>
        </div>
        </div>
        @foreach ($hotel->rooms as $room)
            <div class="container-fluid">
            <div class="row">
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="destination">
                        <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset($room->image) }});">
                            
                        </a>
                        <div class="text p-3">
                            <div class="d-flex">
                                <div class="one">
                                    <h3><a href="#">Type: {{ $room->type }}</a></h3>
                                    
                                </div>
                                {{-- <div class="two">
                                    <span class="price">$200</span>
                                </div>
 --}}                           </div>
                            <p> <span><h6>Description:</h6></span> {!!htmlspecialchars_decode($room->description)!!}</p>
                            <div class=" col-md-4">
                                <h4 class="Offset-2">Book Now</h4>
                                <form action="{{ route('store.booking') }}" method="post">
                                    @csrf

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <input type="hidden" name="roomid" value="{{ $room->id }}">
                                    <div class="form-group date">
                                        <label for="exampleInputEmail1">Check in Date</label>
                                        <input type="text" name="checkin_date" class="form-control checkin_date"  id="checkin_date{{ $loop->index }}">   
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Check Out Date</label>
                                        <input type="text" name="checkout_date" class="form-control checkout_date" id="checkout_date{{ $loop->index }}">   
                                      </div>
                                      <h5 class="text-danger" id="notice{{ $loop->index }}"></h5>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Days to stay</label>
                                        <input type="text" name="days" value="1" class="form-control" id="days{{ $loop->index }}">
                                      </div>
                                      
                                       <div class="form-group">
                                        <label for="exampleInputEmail1">Cost (BDT)</label>
                                        <input type="text" name="costing" value="{{ $room->cost }}" class="form-control" id="cost{{ $loop->index }}">
                                        <input type="hidden" value="{{ $room->cost }}" class="form-control" id="rawcost{{ $loop->index }}" disabled>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Bkash Marchent Number</label>
                                        <input type="text" value="{{ $room->hotels[0]->phone }}" class="form-control" id="bkash{{ $loop->index }}"  disabled>
                                      </div>
                                      <p><h6>Pay Taka <span id="cost2{{ $loop->index }}"></span> to the Bkash Marchent Number given above. After paying, give your TrxID below. </h6></p>
                                       <div class="form-group">
                                        <label for="exampleInputEmail1">TrxID</label>
                                        <input type="text" name="trxid" class="form-control" id="trxid{{ $loop->index }}">
                                      </div>
                                      <button type="submit" class="btn btn-sm btn-success w-100" id="btnbook{{ $loop->index }}">Book Now</button>
                                      
                                        <script>
                                          $(document).ready(function(){
                                            $('#checkout_date{{ $loop->index }}').click(function(event) {
                                                var chekin=$("#checkin_date{{ $loop->index }}").datepicker("getDate");
                                                var dateOne = chekin.getDate();
                                                var monthOne = chekin.getMonth()+1;
                                                var yearOne = chekin.getFullYear();
                                                $.post('../api/dateblock',{
                                                    dateOne:dateOne,
                                                    monthOne:monthOne,
                                                    yearOne:yearOne,
                                                    roomid:{{ $room->id }}
                                                },function(match){
                                                    $("#notice{{ $loop->index }}").show();
                                                        if(match == 'busy'){
                                                            $("#notice{{ $loop->index }}").text('This room is booked for this day');
                                                            $("#btnbook{{ $loop->index }}").hide();
                                                            $("#trxid{{ $loop->index }}").hide();
                                                            $("#bkash{{ $loop->index }}").hide();
                                                        }
                                                        else{
                                                            $("#notice{{ $loop->index }}").hide();
                                                            $("#btnbook{{ $loop->index }}").show();
                                                            $("#trxid{{ $loop->index }}").show();
                                                            $("#bkash{{ $loop->index }}").show();
                                                        }
                                                    });

                                            });
                                            $("#days{{ $loop->index }}").click(function(event) {
                                                // Day Counter
                                                var chekin=$("#checkin_date{{ $loop->index }}").datepicker("getDate");
                                                var checkout=$("#checkout_date{{ $loop->index }}").datepicker("getDate");
                                                const stay = Math.ceil(Math.abs((chekin.getTime() - checkout.getTime()) / 86400000));
                                                $("#days{{ $loop->index }}").val(stay);

                                                // Cost Counter
                                                var days = $("#days{{ $loop->index }}").val();
                                                  var cost = $("#rawcost{{ $loop->index }}").val();
                                                  var total = days*cost;
                                                  $("#cost{{ $loop->index }}").val(total);
                                                  $("#cost2{{ $loop->index }}").text(total);
                                            });
                                        });
                                      </script>
                                </form>
                            </div>
                            <p class="bottom-area d-flex">
                                
                                <span class="ml-auto float-right"><a href="{{ route('hotels') }}" class=" btn btn-success btn-sm">Back</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                
                
                
            </div>
        </div>
        @endforeach
    </section>  
    </section>  

<section class="ftco-section" >
        <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Reviews of This Hotel</h2>
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
                @endforeach
            </div>
            
            {{ $reviews->links() }}
        </div>
    
</section>
    
@endsection