@extends('frontend.layouts.layout')

@section('content')
  <main>
    <section class="container">
      @include('frontend.layouts.sidebar')
      <div class="section-cont">
        @include('frontend.layouts.product-sort')
        <div class="prod-items section-items">
          @foreach($datas as $subcat)
          <div class="col-sm-3 text-center">
            <div class="category-image">
              <a href="{{ url('category-list', [$subcat->id, make_slug($subcat->name)] )}}"><img src="/{{$subcat->image}}" class="img-responsive" alt="{{$subcat->name}}"></a>
            </div>
            <h3><a href="{{ url('category-list', [$subcat->id, make_slug($subcat->name)] )}}">{{$subcat->name}}</a></h3>
          </div>
          @endforeach
        </div>
      </div>

    </section>
  </main>
@endsection