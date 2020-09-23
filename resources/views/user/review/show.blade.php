@extends('user.home')
@section('title', '- My Reviews')
@section('rev', 'active')
@section('content')
<section class="ftco-section" >
	<section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">My Reviews</h2>
          </div>
        </div>
    	</div>
    	<div class="container mb-4"> 
    		<center>
				<a href="{{ route('new.rivew') }}" class="btn btn-md btn-success">Write Review</a>
				<a href="{{ route('reviews') }}" class="btn btn-md btn-success">Back</a>
    		</center>	 
    	</div>
    	{{-- Table --}}
			<div class="card shadow mb-4">
            <div class="card-header py-3 bg-info">
              <h6 class="m-0 font-weight-bold text-light ">Reviews by You</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#SL</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Posted At</th>
                      <th>Clicked</th>
                      <th>Edit</th>
                      <th>Delete</th>   
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#SL</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Posted At</th>
                      <th>Clicked</th>
                      <th>Edit</th>
                      <th>Delete</th> 
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($reviews as $review)
                      <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{ $review->title }}</td>
                      <td>{{ $review->category }}</td>
                      <td>{{$review->created_at->diffForHumans()}}</td>
                      <td>{{$review->counter}}</td>
                      <td><a href="{{ route('edit.review',$review->id) }}"><i class="fas fa-edit text-success ml-3"></i>
</a></td>
                      <td><a href="{{ route('destroy.review',$review->id) }}" id="delete"><i class="fa fa-trash text-danger ml-3" aria-hidden="true"></i></a></td>
                    </tr>
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