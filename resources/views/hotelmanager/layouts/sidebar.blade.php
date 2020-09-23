<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/shopadmin') }}" class="brand-link">
    <img src="{{asset('public/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">
            Hotel Manager
    </span>
  </a>
 
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="info">
        <a href="#" class="d-block"><i class="fas fa-user-lock text-white mr-2 ml-3"></i>{{ auth('hotelmanager')->user()->name }}</a>
      </div>
    </div>

    @if(auth('hotelmanager')->user()->approve != null)
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             <li class="nav-item has-treeview @yield('menuHotel')">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              My profile
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('profile.admin') }}" class="nav-link @yield('hotelActive')">
                  <i class="far fa-sticky-note nav-icon"></i>

                  <p>Edit Profile</p>
                </a>
              </li>
              
          </ul>
        </li>
        
        <li class="nav-item has-treeview @yield('menuHotel')">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Hotel
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add.hotel') }}" class="nav-link @yield('hotelActive')">
                  <i class="far fa-sticky-note nav-icon"></i>

                  <p>Add Hotel</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ route('view.hotels') }}" class="nav-link @yield('viewHotelActive')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>View Hotels</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview @yield('menuRoom')">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Rooms
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add.room') }}" class="nav-link @yield('roomActive')">
                  <i class="far fa-sticky-note nav-icon"></i>

                  <p>Add Room</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{ route('view.rooms') }}" class="nav-link @yield('viewRoomActive')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>View Rooms</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('show.booking.admin') }}" class="nav-link @yield('bookingActive')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>Bookings</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('view.canceled') }}" class="nav-link @yield('cbActive')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>Cancelled Bookings</p>
              </a>
            </li>
          </ul>
        </li>
        
      </ul>
    </nav>
    @endif

    @if(auth('hotelmanager')->user()->approve == null)
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview @yield('menuHotel')">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              My profile
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('profile.admin') }}" class="nav-link @yield('hotelActive')">
                  <i class="far fa-sticky-note nav-icon"></i>

                  <p>Edit Profile</p>
                </a>
              </li>
              
          </ul>
        </li>
      </ul>
    </nav>
    @endif
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
