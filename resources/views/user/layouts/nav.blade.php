<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{ url('/') }}">Travel Assistant</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          {{-- <li class="nav-item @yield('home')"><a href="{{ url('/') }}" class="nav-link">Home</a></li> --}}
	          <li class="nav-item @yield('places')"><a href="{{ route('places') }}" class="nav-link">Places</a></li>
	          @guest
	          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
	          @endguest
	          @if (Auth::check())
	          	<li class="nav-item @yield('profile')"><a href="{{ route('login') }}" class="nav-link">Profile</a></li>
	          	<li class="nav-item @yield('rev')"><a href="{{ route('reviews') }}" class="nav-link">Reviews</a></li>
	          @endif
	          {{-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li> --}}
	          <li class="nav-item @yield('hotl')"><a href="{{ route('hotels') }}" class="nav-link">Hotels</a></li>
	          <li class="nav-item @yield('userRestaurant')"><a href="{{ route('restaurants') }}" class="nav-link">Restaurants</a></li>
	          <li class="nav-item @yield('userCounters')"><a href="{{ route('ticketcounters') }}" class="nav-link">Ticket Counters</a></li>
			  <li class="nav-item @yield('userGuide')"><a href="{{ route('guides') }}" class="nav-link">Local Guides</a></li>
	          @if (Auth::check())
	          	<li class="nav-item"><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
	          	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
	          @endif
	        </ul>
	      </div>
	    </div>
	  </nav>