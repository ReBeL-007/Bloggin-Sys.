<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
<div class="container">
    @if(Auth::guest())
      <a class="navbar-brand" href="{{ url('/')}}">Blogs</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
        </button>
        @else
        <a class="navbar-brand" href="{{ url('home')}}">Blogs</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
        </button>
      @endif
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sample Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>

          @if(Auth::guest())
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
          </li>
          @else
          <li class="nav-item dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              </ul>
          </li>
      @endif
        </ul>
      </div>
    </div>
    </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url(@yield('bg-img'))">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>@yield('title')</h1>
            <span class="subheading">@yield('subheading')</span>
          </div>
        </div>
      </div>
    </div>
  </header>