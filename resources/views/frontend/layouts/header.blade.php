
    <header class="header">
      <!-- Tob Bar-->
      <div class="top-bar">
        <div class="container-fluid">
          <div class="row d-flex align-items-center">
            <div class="col-sm-4 hidden-lg-down mob-contact">
              <ul class="list-inline">
                <li class="list-inline-item"><i class="icon-telephone"></i><a href="tel:{!! $aboutinfo[0]->mobile !!}">{!! $aboutinfo[0]->mobile !!}</a></li>
                <li class="list-inline-item"><i class="icon-mail"></i><a href="mailto:{!! $aboutinfo[0]->email !!}">{!! $aboutinfo[0]->email !!}</a></li>
              </ul>
            </div>
            <div class="col-sm-8 d-flex justify-content-end mob-search">
              <ul class="social-menu list-inline">
                  <li class="list-inline-item">
                      
        {!! Form::open(['url' => ['/q/product'], 'method' =>'post','enctype'=>"multipart/form-data"]) !!}
            <input type="search" class="input" name="search" id="search" placeholder="What are you looking for?">
            <button class="btn-primary btn-sm btn" type="submit" class="submit"><i class="fa fa-search"></i></button>
        {!! Form::close() !!}
                  </li>
                  @guest()
                  <li class="list-inline-item"><a href="{{route('login')}}">Login</a></li>
                  <li class="list-inline-item"><a href="{{route('register')}}">Register</a></li>
                  @endguest
                  @auth()
                  @role('admin')
                    <li class="list-inline-item"><a href="/dashboard">Dashboard</a></li>
                  @endrole
                  <li class="list-inline-item"><a href="/user/profile">Profile</a></li>
                  <li class="list-inline-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </li>
                  @endauth
              </ul>
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-expand-md">
        <div class="container-fluid">  
          <!-- Navbar Header  -->
          <a href="/" class="navbar-brand"><img src="/{{$aboutinfo[0]->header_logo}}" alt="uthsov" height="60"></a>
          <button type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
          <!-- Navbar Collapse -->
          <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item"><a href="/" class="nav-link">Home</a>
              <li class="nav-item"><a href="{{route('shop.page')}}" class="nav-link">Shop</a>
              <!-- <li class="nav-item"><a href="{{route('custom.order')}}" class="nav-link">Custom Order</a> -->
              <li class="nav-item"><a href="{{route('blog')}}" class="nav-link">Our Blog</a>
              <li class="nav-item"><a href="/photo-gallery" class="nav-link">Gallery</a>
              <li class="nav-item"><a href="/contact-us/create" class="nav-link">Contact Us</a>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    @if($aboutinfo[0]->notice)
    <div class="header-notice">
      <div class="container">
        <marquee behavior='scroll' direction='left' scrollamount='3' onmouseover='this.stop()' onmouseout='this.start()'>{{$aboutinfo[0]->notice}}</marquee>
      </div>
    </div>
    @endif