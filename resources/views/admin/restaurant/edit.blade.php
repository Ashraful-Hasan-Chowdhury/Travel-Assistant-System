@extends('multiauth::layouts.app')
@section('viewRestaurant', 'active')
@section('menuRestaurant', 'menu-open')
@section('mainTitle', 'Edit Restaurant Info |')
@section('content')
{{-- Page Header starts --}}
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Restaurant Info</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
{{-- Page Header Ends --}}
{{-- Form Starts --}}
<div class="row" id="app">
{{-- Vue id is here --}}

<div class="col-md-6">
      <div class="card">
              <div class="card-header bg-primary">
                <h5 class="card-title">Find & Mark a Restaurant</h5>
              </div>
              <div class="card-body"> 
                <map-component v-model="place" :latval="{{ $restaurant->lat }}" :lngval="{{ $restaurant->lng }}"></map-component>
              </div>
            </div>
    </div>

    <div class="col-md-6">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Restaurant Informations</h3>
                <a href="{{ route('view.restaurants') }}" class="btn btn-success btn-sm float-right">Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update.restaurant',$restaurant->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                  <center>
                    <img src="{{ asset($restaurant->image) }}" class="img-fluid border border-primary" style="height: 180px;width: 300px;" alt="No Image Found">
                  </center>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Restaurant Name</label>
                    <input name="name" type="text" v-if="place.name!=null" v-model="place.name" class="form-control" >
                    <input name="name" type="text" v-else value="{{ $restaurant->name }}" class="form-control" >
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Latitude</label>
                    <input name="lat" type="text" v-if="place.lat!=null" v-model="place.lat" class="form-control" placeholder="Enter Latitude">
                    <input name="lat" type="text" v-else value="{{ $restaurant->lat }}" class="form-control" placeholder="Enter Latitude">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Longitude</label>
                    <input name="lng" type="text" v-if="place.lng!=null" v-model="place.lng" class="form-control" >
                    <input name="lng" type="text" v-else value="{{ $restaurant->lng }}" class="form-control" >
                  </div>
                  {{-- vue id ends here --}}
                  <div class="form-group">
                    <label>Direction</label>
                    <textarea name="direction" type="text" class="form-control" rows="5" >{{ $restaurant->direction }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Desciption</label>
                    <textarea name="desciption" type="text" class="form-control" rows="5" >{{ $restaurant->desciption }}</textarea>
                  </div>
                   
                <div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>

                      <input type="hidden" name="old_photo" value="{{ $restaurant->image }}">
                    </div>
                  </div> 
                  <button type="submit" class="btn btn-primary">Save Restaurant</button>
                </div>
              </div>
              </form>
            </div>
          </div>
    </div>

 <script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
  
{{-- Form Endds --}}
 {{-- Main Card Starts --}}

 {{-- Main Card Ends --}}


@endsection