 @extends('user.home')
 @section('title', '- Nearby Ticket Counters')
@section('userCounters', 'active')
@section('content')

<section class="ftco-section" id="app">
    	<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Nearby Ticket Counters</h2>
          </div>
        </div>
    	</div>
    	 <counter-map v-model="place"></counter-map>
    </section>  
@endsection