
    <header class="header">
      <!-- Tob Bar-->
      <div class="top-bar">
        <div class="container-fluid">
          <div class="row d-flex align-items-center">
            <div class="col-sm-6 hidden-lg-down">
              <ul class="list-inline">
                <li class="list-inline-item"><i class="icon-telephone"></i>+8801920225330</li>
                <li class="list-inline-item"><a href="mailto:info@uthsov.com">info@uthsov.com</a></li>
              </ul>
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
              <ul class="social-menu list-inline">
                <li class="list-inline-item"><a href="#" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="https://www.facebook.com/uthsov/" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" title="youtube"><i class="fa fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-expand-lg">
        <div class="search-area">
          <div class="search-area-inner d-flex align-items-center justify-content-center">
            <div class="close-btn"><i class="icon-close"></i></div>
            <form action="#">
              <div class="form-group">
                <input type="search" name="search" id="search" placeholder="What are you looking for?">
                <button type="submit" class="submit"><i class="icon-search"></i></button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid">  
          <!-- Navbar Header  -->
          <a href="/" class="navbar-brand"><img src="/frontend/img/logo.png" alt="uthsov" height="73"></a>
          <button type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
          <!-- Navbar Collapse -->
          <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item"><a href="/" class="nav-link">Home</a>
              <li class="nav-item"><a href="{{route('shop.page')}}" class="nav-link">Shop</a>
              <!-- <li class="nav-item"><a href="{{route('custom.order')}}" class="nav-link">Custom Order</a> -->
              <li class="nav-item"><a href="{{route('blog')}}" class="nav-link">Our Blog</a>
              <li class="nav-item"><a href="/contact-us/create" class="nav-link">Contact Us</a>
            </ul>
            <div class="right-col d-flex align-items-lg-center flex-column flex-lg-row">
              <!-- Search Button-->
              <div class="search"><i class="icon-search"></i></div>
              <!-- User Not Logged - link to login page-->

              <div class="user dropdown show"><a id="userdetails" href="https://example.com/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="icon-profile"></i></a>
                <ul aria-labelledby="userdetails" class="dropdown-menu"> 
                  @guest()
                  <li class="dropdown-item"><a href="{{route('login')}}">Login</a></li>
                  <li class="dropdown-item"><a href="{{route('register')}}">Register</a></li>
                  @endguest
                  @auth()
                  @role('admin')
                    <li class="dropdown-item"><a href="/dashboard">Dashboard</a></li>
                  @endrole
                  <li class="dropdown-item"><a href="/user/profile">Profile</a></li>
                  <li class="dropdown-item" class="dropdown-divider"></li>
                  <li class="dropdown-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </li>
                  @endauth
                </ul>
              </div>
              <!-- Cart Dropdown-->
              <div class="header-cart">
                @include('frontend.layouts.quickcart')
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>