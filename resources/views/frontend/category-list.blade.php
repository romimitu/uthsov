@extends('frontend.layouts.layout')

@section('content')
  <main>
    <section class="container">
      @include('frontend.layouts.sidebar')
      <div class="section-cont">
        @include('frontend.layouts.product-sort')
        <div class="prod-items section-items">
          @foreach($datas as $category)
          <div class="col-sm-3 text-center">
            <div class="category-image">
              <a href="{{ url('category-product', [$category->id, make_slug($category->name)] )}}"><img src="/{{$category->image}}" class="img-responsive" alt="{{$category->name}}"></a>
            </div>
            <h3><a href="{{ url('category-product', [$category->id, make_slug($category->name)] )}}">{{$category->name}}</a></h3>
          </div>
          @endforeach
        </div>
      </div>

    </section>
  </main>
@endsection