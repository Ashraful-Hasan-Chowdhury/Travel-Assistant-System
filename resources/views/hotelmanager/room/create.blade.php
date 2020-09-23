@extends('hotelmanager.layouts.app')
@section('menuRoom', 'menu-open')
@section('roomActive', 'active')
@section('mainTitle', 'Add New Room |')
@section('content')
{{-- Page Header starts --}}
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New Room</h1>
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
<div class="row">
{{-- Vue id is here --}}

    <div class="col-md-10 offset-1">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Room Informations</h3>
              </div>
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('store.room') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Hotel Name</label>
                    <select name="hotel" class="form-control" id="exampleFormControlSelect1">
                      @foreach ($hotels as $hotel)
                        @foreach ($hotel->hotelmanagers as $manager)
                          @if ($manager->id == auth('hotelmanager')->id())
                             <option value="{{ $hotel->id }}">{{ $hotel->hname }}</option>
                          @endif
                        @endforeach
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Room Type</label>
                    <select name="type" class="form-control" id="exampleFormControlSelect1">
                      <option>AC</option>
                      <option>Non AC</option>
                    </select>
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Qunatity (*How many rooms you have?)</label>
                    <input name="quantity" type="text" class="form-control" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose Image</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Desciption</label>
                    <textarea name="description" type="text" class="form-control" rows="5" id="editor"></textarea>
                  </div>
                  <div class="form-group" >
                    <label for="exampleInputEmail1">Cost (BDT/Day)</label>
                    <input name="cost" type="text" class="form-control" >
                  </div>
                   <button type="submit" class="btn btn-primary">Save Room</button>
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
<script>
  CKEDITOR.replace('editor', {
     filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
     filebrowserUploadMethod: 'form'
 })
 CKEDITOR.config.height = 500;
</script>
  
{{-- Form Endds --}}
 {{-- Main Card Starts --}}

 {{-- Main Card Ends --}}


@endsection