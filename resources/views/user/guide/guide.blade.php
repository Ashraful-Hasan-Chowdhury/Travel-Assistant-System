 @extends('user.home')
 @section('title', '- Nearby Guides')
@section('userGuide', 'active')
@section('content')

<section class="ftco-section" id="app">
    	<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Nearby Guides</h2>
          </div>
        </div>
    	</div>
    	 <guide-map v-model="place"></guide-map>
    </section>  
@endsection