@extends('multiauth::layouts.app')
@section('addGuide', 'active')
@section('menuGuide', 'menu-open')
@section('mainTitle', 'Add New Guide |')
@section('content')
{{-- Page Header starts --}}
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New Guide</h1>
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
                <h5 class="card-title">Find & Mark a Guide's Location</h5>
              </div>
              <div class="card-body">
                <map-component v-model="place"></map-component>
              </div>
            </div>
    </div>
    <div class="col-md-6">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Guide Informations</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('store.guide') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Guide Name</label>
                    <input name="name" type="text" class="form-control" >
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Latitude</label>
                    <input name="lat" type="text" v-model="place.lat" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Longitude</label>
                    <input name="lng" type="text" v-model="place.lng" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input name="phone" type="text" class="form-control" >
                  </div>
                  {{-- vue id ends here --}}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea name="address" type="text" v-model="place.address" class="form-control" rows="5" ></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Desciption & Costings</label>
                    <textarea name="description" type="text" class="form-control" rows="5" ></textarea>
                  </div>

                <div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose Image</label>
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
