@extends('multiauth::layouts.app')
@section('viewGuide', 'active')
@section('menuGuide', 'menu-open')
@section('mainTitle', 'Edit Guide Info |')
@section('content')
{{-- Page Header starts --}}
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Guide Info</h1>
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
                <h5 class="card-title">Find & Mark a Guide</h5>
              </div>
              <div class="card-body"> 
                <map-component v-model="place" :latval="{{ $guide->lat }}" :lngval="{{ $guide->lng }}"></map-component>
              </div>
            </div>
    </div>

    <div class="col-md-6">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Guide Informations</h3>
                <a href="{{ route('view.guides') }}" class="btn btn-success btn-sm float-right">Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update.guide',$guide->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                  <center>
                    <img src="{{ asset($guide->image) }}" class="img-fluid border border-primary" style="height: 180px;width: 300px;" alt="No Image Found">
                  </center>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Guide Name</label>
                    <input name="name" type="text" value="{{ $guide->name }}" class="form-control" >
                  </div>
                  
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Latitude</label>
                    <input name="lat" type="text" v-if="place.lat!=null" v-model="place.lat" class="form-control" placeholder="Enter Latitude">
                    <input name="lat" type="text" v-else value="{{ $guide->lat }}" class="form-control" placeholder="Enter Latitude">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Longitude</label>
                    <input name="lng" type="text" v-if="place.lng!=null" v-model="place.lng" class="form-control" >
                    <input name="lng" type="text" v-else value="{{ $guide->lng }}" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input name="phone" value="{{ $guide->phone }}" type="text" class="form-control" >
                  </div>
                  {{-- vue id ends here --}}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea name="address" type="text" v-if="place.address!=null" v-model="place.address" class="form-control" rows="5" ></textarea>
                    <textarea name="address" type="text" v-else class="form-control" rows="5" >{{ $guide->address }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Desciption</label>
                    <textarea name="description" type="text" class="form-control" rows="5" >{{ $guide->description }}</textarea>
                  </div>
                   
                <div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>

                      <input type="hidden" name="old_photo" value="{{ $guide->image }}">
                    </div>
                  </div> 
                  <button type="submit" class="btn btn-primary">Save Guide</button>
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