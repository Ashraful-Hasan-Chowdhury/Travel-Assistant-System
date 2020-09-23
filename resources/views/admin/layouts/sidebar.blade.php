<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin.home') }}" class="brand-link">
    <img src="{{asset('public/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">
            Dashboard
    </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="info">
        <a href="#" class="d-block"><i class="fas fa-user-lock text-white mr-2 ml-3"></i>{{ auth('admin')->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview @yield('menuPlace')">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Places
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add.place') }}" class="nav-link @yield('cpActive')">
                  <i class="far fa-sticky-note nav-icon"></i>

                  <p>Add Place</p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ route('view.places') }}" class="nav-link @yield('viewActive')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>View Places</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview @yield('menuUser')">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              User
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.show.rivew') }}" class="nav-link @yield('revActive')">
                  <i class="far fa-sticky-note nav-icon"></i>

                  <p>Reviews</p>
                </a>
              </li>
          </ul>
        </li>
        <li class="nav-item has-treeview @yield('menuRestaurant')">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Restaurant
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add.restaurant') }}" class="nav-link @yield('addRestaurant')">
                  <i class="far fa-sticky-note nav-icon"></i>

                  <p>Add Restaurant</p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ route('view.restaurants') }}" class="nav-link @yield('viewRestaurant')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>View Restaurants</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview @yield('menuTicketCounter')">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Ticket Counter
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add.ticketcounter') }}" class="nav-link @yield('addTicketCounter')">
                  <i class="far fa-sticky-note nav-icon"></i>

                  <p>Add Ticket Counter</p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ route('view.ticketcounters') }}" class="nav-link @yield('viewTicketCounter')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>View Ticket Counters</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview @yield('menuGuide')">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Guide
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add.guide') }}" class="nav-link @yield('addGuide')">
                  <i class="far fa-sticky-note nav-icon"></i>

                  <p>Add Guide</p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ route('view.guides') }}" class="nav-link @yield('viewGuide')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>View Guides</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview @yield('menuGuide')">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-blog"></i>
            <p>
              Hotel Managers
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('view.manager') }}" class="nav-link @yield('addGuide')">
                  <i class="far fa-sticky-note nav-icon"></i>

                  <p>View Requests</p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ route('view.guides') }}" class="nav-link @yield('viewGuide')">
                <i class="fas fa-folder-open nav-icon"></i>
                <p>Manage Profiles</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
