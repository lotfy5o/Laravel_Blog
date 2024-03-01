<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="{{ route('Theme.index') }}">
            <img src="{{asset('assets')}}/img/logo.png" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-center">
              <li class="nav-item @yield('home-active')"><a class="nav-link" href="{{ route('Theme.index') }}">Home</a></li>
              <li class="nav-item @yield('categories-active') submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Categories</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="{{ route('Theme.category') }}">Food</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('Theme.category') }}">Bussiness</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ route('Theme.category') }}">Travel</a></li>
                </ul>
              </li>
              <li class="nav-item @yield('contacts-active')"><a class="nav-link" href="{{ route('Theme.contact') }}">Contact</a></li>
            </ul>

            <!-- Add new blog -->
            <a href="#" class="btn btn-sm btn-primary mr-4">Add New</a>
            <!-- End - Add new blog -->

            <ul class="nav navbar-nav navbar-right navbar-social">
                @if (!Auth::check())
                <a href="{{ route('register') }}" class="btn btn-sm btn-warning">Register / Login</a>

                @else
                <li class="nav-item submenu dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                    aria-expanded="false">{{ Auth::user()->name }}</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="blog-details.html">My Blogs</a></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <li class="nav-item"><a class="nav-link" href="javascript:$('form').submit()">Logout</a></li>
                            <!-- <input type="submit" value="Logout" class="nav-link"> -->
                        </form>
                    </li>
                  </ul>
                </li>

                @endif
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
