<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Travel Assistant @yield('title')</title>
    @include('user.layouts.head')
  </head>
  <body>

	  @include('user.layouts.nav')

    @include('user.layouts.header')
    @yield('content')
   {{--  @include('user.layouts.rent')

    @include('user.layouts.things')

    @include('user.layouts.idea')

		@include('user.layouts.agency')

    @include('user.layouts.activities')

    @include('user.layouts.destination')

    @include('user.layouts.counter')


    @include('user.layouts.hotels')

    @include('user.layouts.customer')

    @include('user.layouts.restaurant')

    @include('user.layouts.tips')

		@include('user.layouts.newsletter') --}}

    @include('user.layouts.footer')



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    @include('user.layouts.scripts')
    
    <script>
      @if(Session::has('message'))
                    var type = "{{ Session::get('alert-type', 'info') }}";
                    switch(type){
                        case 'info':
                            toastr.info("{{ Session::get('message') }}");
                            break;

                        case 'warning':
                            toastr.warning("{{ Session::get('message') }}");
                            break;

                        case 'success':
                            toastr.success("{{ Session::get('message') }}");
                            break;

                        case 'error':
                            toastr.error("{{ Session::get('message') }}");
                            break;
                    }
                  @endif
    </script>

    {{-- sweet alert --}}
     <script>
      $(document).on("click","#delete",function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                  window.location.href= link;
              }
            })
            });
    </script>


  </body>
</html>
