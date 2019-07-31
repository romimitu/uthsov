
<section class="no-padding">
  <!-- Hero Slider-->
  <div class="main-banner">
    @foreach($sliders as $silder)
      <img src="/{{$silder->image}}" alt="main-banner" class="img-responsive">
      <div class="search-box">
      {!! Form::open(['url' => ['/q/product'], 'method' =>'post','enctype'=>"multipart/form-data"]) !!}
        <div class="form-group">
          <input type="search" name="search" id="search" placeholder="Search for products (e.g. Fish, Body Wash)">
          <button type="submit" class="submit"><i class="fa fa-search"></i></button>
        </div>
      {!! Form::close() !!}
      </div>
    @endforeach
  </div>
</section>