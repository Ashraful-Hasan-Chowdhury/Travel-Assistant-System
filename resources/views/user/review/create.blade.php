@extends('user.home')
@section('title', '- Write Review')
@section('rev', 'active')
@section('content')
<section class="ftco-section" >
	<section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Place Reviews</h2>
          </div>
        </div>
    	</div>
    	<div class="container mb-4"> 
    		<center>
				<a href="{{ route('show.rivew',Auth::id()) }}" class="btn btn-md btn-success">My Reviews</a>
    		</center>	 
    	</div>
    </section>
<div class="container">
    <div class="card">
        <div class="card-header bg-info text-light">
        Write a place review
      </div>
      <div class="card-body">
        <!-- Error handler -->
      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger">
        <ul>
          <li>{{ $error }}</li>
        </ul>
      </div>
      @endforeach
      @endif
      <!-- Error Handler -->
        <form action="{{ route('store.review',Auth::id()) }}" method="post" enctype="multipart/form-data">
        @csrf

        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title">
              </div>
              <div class="form-group">
                <label for="title">Subtitle</label>
                <input type="text" name="subtitle" class="form-control" placeholder="Subtitle">
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title"> Image</label>
                    <div class="custom-file mb-3">
                      <input type="file" name="image" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose Picture</label>
                    </div>
              </div>
              <div class="form-group">
                <div class="form-group clearfix">
                          <div class="icheck-success d-inline">
                            <input
                              type="radio"
                              name="category"
                              id="placecheck"
                              value="place"
                            />
                            <label for="placecheck"> Places </label>
                          </div>
                          <div class="icheck-success d-inline">
                            <input type="radio" name="category" id="hotelcheck" value="hotel"/>
                            <label for="hotelcheck"> Hotels </label>
                          </div>
                          <div class="icheck-success d-inline">
                            <input
                              type="radio"
                              name="category"
                              id="restaurantcheck"
                              value="restaurant"
                            />
                            <label for="restaurantcheck">
                              Restaurants
                            </label>
                          </div>
                          <div class="icheck-success d-inline">
                            <input
                              type="radio"
                              name="category"
                              id="guidecheck"
                              value="guide"
                            />
                            <label for="guidecheck">
                              Guides
                            </label>
                          </div>
                        </div>
                        
                <div id="placeInput">
                  <select class="select2 border-primary placeInput" multiple="multiple"
                                        data-placeholder="Select Places" data-dropdown-css-class="select2-purple"
                                        name="places[]" style="width: 100%;">
                                        @foreach ($places as $row)
                                            <option value="{{$row->id}}">{{$row->pname}}</option>
                                        @endforeach  
                    </select>
                </div>
                
                <div id="hotelInput">
                  <select class="select2 border-primary hotelInput" multiple="multiple"
                                        data-placeholder="Select Hotel" data-dropdown-css-class="select2-purple"
                                        name="hotels[]" style="width: 100%;">
                                        @foreach ($hotels as $row)
                                            <option value="{{$row->id}}">{{$row->hname}}</option>
                                        @endforeach  
                    </select>
                </div>
                    
                    <div id="restaurantInput">
                      <select class="select2 border-primary restaurantInput" multiple="multiple"
                                        data-placeholder="Select Restaurant" data-dropdown-css-class="select2-purple"
                                        name="restaurants[]" style="width: 100%;">
                                        @foreach ($restaurants as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach  
                    </select>
                    </div>
                    <div id="guideInput">
                      <select class="select2 border-primary restaurantInput" multiple="multiple"
                                        data-placeholder="Select Guide" data-dropdown-css-class="select2-purple"
                                        name="guides[]" style="width: 100%;">
                                        @foreach ($guides as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach  
                    </select>
                    </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group offset-1">
                <label class="mt-3" for="title">Body</label>
                    <textarea name="body" id="editor"></textarea>
              </div>
        </div>
      </div>
      <div class="card-footer">
          <div class="form-group float-right mr-2">
                <input type="submit" value="Submit" class="btn btn-success ">
                <a href="{{ route('reviews') }}" class="btn btn-success">Back</a>
            </div>
      </div>
      </form>
    </div>
</div>
</section>
<script>
  CKEDITOR.replace('editor', {
     filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
     filebrowserUploadMethod: 'form'
 })
 CKEDITOR.config.height = 500;
</script>
 <script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<script type="text/javascript">
    $(document).ready(function () {
    $('.select2').select2();
  
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
  });
  });
</script>
<script>
      $(document).ready(function(){
        $("#placeInput").show();
          $("#hotelInput").hide();
          $("#restaurantInput").hide();
          $("#guideInput").hide();

      $("#placecheck").click(function(event) {
          $("#placeInput").show("slow");
          $("#hotelInput").hide("slow");
          $("#restaurantInput").hide("slow");
          $("#guideInput").hide("slow");
      });
      $("#hotelcheck").click(function(event) {  
          $("#placeInput").hide("slow");
          $("#hotelInput").show("slow");
          $("#restaurantInput").hide("slow");
          $("#guideInput").hide("slow");
      });
      $("#restaurantcheck").click(function(event) {
          $("#placeInput").hide("slow");
          $("#hotelInput").hide("slow");
          $("#restaurantInput").show("slow");
          $("#guideInput").hide("slow");
      });
      $("#guidecheck").click(function(event) {
          $("#placeInput").hide("slow");
          $("#hotelInput").hide("slow");
          $("#restaurantInput").hide("slow");
          $("#guideInput").show("slow");
      });
    });
</script>
@endsection