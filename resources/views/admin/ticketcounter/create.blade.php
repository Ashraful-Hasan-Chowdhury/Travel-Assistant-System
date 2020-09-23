@extends('multiauth::layouts.app')
@section('addTicketCounter', 'active')
@section('menuTicketCounter', 'menu-open')
@section('mainTitle', 'Add New Ticketcounter |')
@section('content')
{{-- Page Header starts --}}
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New Ticketcounter</h1>
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
                <h5 class="card-title">Find & Mark a Ticketcounter Location</h5>
              </div>
              <div class="card-body"> 
                <map-component v-model="place"></map-component>
              </div>
            </div>
    </div>

    <div class="col-md-6">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ticketcounter Informations</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('store.ticketcounter') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Ticketcounter Name</label>
                    <input name="name" type="text" v-model="place.name" class="form-control" >
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Ticketcounter Type</label>
                    <input name="type" type="text" class="form-control" placeholder="Ex. Bus,Train,Launch..." >
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
                    <label for="exampleInputEmail1">Direction</label>
                    <textarea name="direction" type="text" class="form-control" rows="5" ></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Desciption & Costings</label>
                    <textarea name="desciption" type="text" class="form-control" rows="5" ></textarea>
                  </div>
                   
                <div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose Image</label>
                    </div>
                  </div> 
                  <button type="submit" class="btn btn-primary">Save Ticketcounter</button>
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