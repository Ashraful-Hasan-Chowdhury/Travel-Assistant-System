@extends('user.home')
@section('title', '- My Reviews')
@section('rev', 'active')
@section('content')
<section class="ftco-section" >
	<section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">My Hotel Bookings</h2>
          </div>
        </div>
    	</div>
    	{{-- <div class="container mb-4"> 
  
    	</div> --}}
    	{{-- Table --}}
			<div class="card shadow mb-4">
            <div class="card-header py-3 bg-info">
              <h6 class="m-0 font-weight-bold text-light ">Hotel Bookings by You</h6>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <h5 class="text-danger text-center">** you can cancel a booking within 1 day of booking,10% of total amount will be charged for that.</h5>
                  <thead>
                    <tr>
                      <th>Hotel Name</th>
                      <th>Phone</th>
                      <th>Room Id</th>
                      <th>Room Type</th>
                      <th>Check in Date</th>
                      <th>Check out Date</th>
                      <th>Paid Amount</th>
                      <th>TrxID</th>
                      <th>Booked at</th>
                      <th>Status</th>
                      <th>Cancel</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($bookings as $booking)
                    @if ($booking->status != 'canceled')
                      
                    
          					@foreach ($booking->users as $user)
          					@if ($user->id == auth()->id())
					<tr>
                      <td>{{$booking->rooms[0]->hotels[0]->hname}}</td>
                      <td>{{$booking->rooms[0]->hotels[0]->phone}}</td>
                      <td>{{ $booking->rooms[0]->id }}</td>
                      <td>{{ $booking->rooms[0]->type }}</td>
                      <td>{{ $booking->checkin_date }}</td>
                      <td>{{ $booking->checkout_date }}</td>
                      <td>{{ $booking->cost }}</td>
                      <td>{{ $booking->trxid }}</td>
                      <td>{{ $booking->created_at->diffForHumans() }}</td>
                      {{-- <td>{{ $booking->status }}</td> --}}
                      <td>
                          @if ($booking->status == 'confirmed')
                            <span class="badge badge-success">{{ $booking->status }}</span>
                          @endif
                          @if ($booking->status == 'rejected')
                            <span class="badge badge-danger ml-2">{{ $booking->status }}</span>
                          @endif
                          @if ($booking->status == 'pending')
                            <span class="badge badge-info">{{ $booking->status }}</span>
                          @endif

                      </td>
                        <td>
                        @php
                          $today = date('y-m-d');
                          $dt = date('y-m-d',strtotime($booking->created_at));
                          $diff = strtotime($today) - strtotime($dt);

                          $interval = abs(round($diff / 86400)); 
                        @endphp
                          @if ($interval >1)
                            <strong class="text-danger">cannot cancel</strong>
                          @else
                            <a href="{{ route('cancel.booking',$booking->id) }}" class="btn btn-sm btn-danger">cancel</a>
                          @endif
                      </td>
                    </tr>
					@endif
				@endforeach
        @endif
			@endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="card shadow mb-4 mt-5">
            <div class="card-header py-3 bg-info">
              <h6 class="m-0 font-weight-bold text-light ">Cancelled Bookings</h6>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Hotel Name</th>
                      <th>Phone</th>
                      <th>Room Id</th>
                      <th>Room Type</th>
                      <th>TrxID (hotel)</th>
                      <th>Booked at</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($bookings as $booking)
                    @if ($booking->status== 'canceled')
                    @foreach ($booking->users as $user)
                    @if ($user->id == auth()->id())
                      <tr>
                      <td>{{$booking->rooms[0]->hotels[0]->hname}}</td>
                      <td>{{$booking->rooms[0]->hotels[0]->phone}}</td>
                      <td>{{ $booking->rooms[0]->id }}</td>
                      <td>{{ $booking->rooms[0]->type }}</td>
                      <td>{{ $booking->trx_manager }}</td>
                      <td>{{ $booking->created_at->diffForHumans() }}</td>
                      <td> 
                          @if ($booking->status == 'canceled')
                            <span class="badge badge-danger ml-2">{{ $booking->status }}</span>
                          @endif
                      </td>
                    </tr>
                      @endif
                    @endforeach
                    @endif
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
                  {{-- Table ends --}}
                </div>
              </div>
    	{{-- table --}}
    </section>
</section>

@endsection