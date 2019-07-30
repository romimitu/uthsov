
    <section class="hero hero-home no-padding">
      <!-- Hero Slider-->
      <div class="main-banner">
        @foreach($sliders as $silder)
        <div style="background: url(/{{$silder->image}});" class="item">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 search-box">
                
        {!! Form::open(['url' => ['/q/product'], 'method' =>'post','enctype'=>"multipart/form-data"]) !!}


          <div class="form-group">
            <input type="search" name="search" id="search" placeholder="Search for products (e.g. Fish, Body Wash)">
            <button type="submit" class="submit"><i class="fa fa-search"></i></button>
          </div>
        {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </section>