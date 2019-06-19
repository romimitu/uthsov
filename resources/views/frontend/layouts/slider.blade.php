
    <section class="hero hero-home no-padding">
      <!-- Hero Slider-->
      <div class="owl-carousel owl-theme hero-slider">
        @foreach($sliders as $silder)
        <div style="background: url(/{{$silder->image}});" class="item d-flex align-items-center">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 text-white">
                <h1>{{$silder->title}}</h1>
                <p class="lead">{{$silder->subtitle}}</p><a href="/{{$silder->page_link}}" class="btn btn-template wide shop-now">Shop Now<i class="icon-bag">  </i></a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </section>