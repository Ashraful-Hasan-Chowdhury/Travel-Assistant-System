@extends('user.home')
@section('title', '- Nearby Places')
@section('places', 'active')
@section('content')

<section class="ftco-section" id="app">
    	<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Nearby Places for Travelling</h2>
          </div>
        </div>
    	</div>
    	 <user-map v-model="place"></user-map>
    </section>   
@endsection