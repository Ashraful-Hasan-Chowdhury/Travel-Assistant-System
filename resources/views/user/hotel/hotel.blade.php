 @extends('user.home')
 @section('title', '- Nearby Hotels')
@section('hotl', 'active')
@section('content')

<section class="ftco-section" id="app">
    	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Nearby Hotels to Stay</h2>
          </div>
        </div>
		<center>
			<a href="{{ route('show.booking') }}" class="btn btn-lg btn-success mb-4">My Bookings</a>
		</center>
    	</div>
    	 <hotel-map v-model="place"></hotel-map>
    </section>  
@endsection