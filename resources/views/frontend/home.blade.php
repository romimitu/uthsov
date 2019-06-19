@extends('frontend.layouts.layout')

@section('content')
	
	@include('frontend.layouts.slider')
    <section class="categories">
      <div class="container">
        <header class="text-center">
          <h2 class="text-uppercase">Our Featured Picks</h2>
        </header>
        <div class="row text-left">
          @foreach($features->take(3) as $feature)
          <div class="col-lg-4">
            <a href="/{{$feature->page_link}}">
              <div style="background-image: url(/{{$feature->image}});" class="item d-flex align-items-end">
                <div class="content">
                  <h3 class="h5">{{$feature->title}}</h3><span>{{$feature->subtitle}}</span>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- Men's Collection -->
    <section class="men-collection gray-bg">
      <div class="container">
        <header class="text-center">
          <h2 class="text-uppercase">New Collection</h2>
        </header>
        <!-- Products Slider-->
        <div class="owl-carousel owl-theme products-slider">
          <!-- item-->
          @foreach($products as $product)
          <div class="item">
            <div class="product is-gray">
              <div class="image d-flex align-items-center justify-content-center">
                @if($product->productDetail->count() > 0)
                @if($product->productDetail->max('less_amt') > 0)
                <div class="ribbon ribbon-primary text-uppercase">Discount</div>
                @endif
                @endif
                @if($product->image->count() > 0)
                <img src="/uploads/product/{{$product->image[0]->image}}" alt="product" class="img-fluid">
                @endif
                <div class="hover-overlay d-flex align-items-center justify-content-center">
                  <div class="CTA d-flex align-items-center justify-content-center">
                    <a href="{{ url('product', [$product->id, make_slug($product->title)] )}}" class="visit-product active">
                      <i class="icon-search"></i>View
                    </a>
                  </div>
                </div>
              </div>
              <div class="title text-center">
                <a href="{{ url('product', [$product->id, make_slug($product->title)] )}}">
                  <h3 class="h6 text-uppercase no-margin-bottom">{{$product->title}}</h3>
                </a>
                @if($product->productDetail->count() == 1)
              <input type="text" id="product-size" value="{{$product->productDetail[0]->size_id}}" style="display: none;">
              <input type="text" id="detailsId" value="{{$product->productDetail[0]->id}}" style="display: none;">
              <input type="text" id="product-id" value="{{$product->id}}" style="display: none;">
                <span class="price text-muted">
                  Tk. {{$product->productDetail->max('sales_price')}}
                </span>
                <div class="text-center">
                  <button class="btn btn-template btn-sm wide addCart"><i class="icon-cart"></i> Add to Cart</button>
                </div>
                @elseif($product->productDetail->count() > 1)
                <span class="price text-muted">
                  Tk. {{$product->productDetail->min('sales_price')}}-{{$product->productDetail->max('sales_price')}}
                </span>
                @endif
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- Divider Section-->
    @foreach($features as $feature)
    @if ($loop->last)
    <section style="background: url(/{{$feature->image}});" class="divider">
      <div class="container"> 
        <div class="row">
          <div class="col-lg-6">
            <h2 class="h1 text-uppercase no-margin">{{$feature->title}}</h2>
            <p>{{$feature->subtitle}}</p>
            <a href="/{{$feature->page_link}}" class="btn btn-template wide shop-now">Shop Now<i class="icon-bag"></i></a>
          </div>
        </div>
      </div>
    </section>
    @endif
    @endforeach
    <!-- Women's Collection -->
    <section class="women-collection">
      <div class="container">
        <header class="text-center">
          <h2 class="text-uppercase">Trending Item</h2>
        </header>
        <!-- Products Slider-->
        <div class="owl-carousel owl-theme products-slider">
          @foreach($products as $product)
          <div class="item">
            <div class="product is-gray">
              <div class="image d-flex align-items-center justify-content-center">
                @if($product->productDetail->count() > 0)
                @if($product->productDetail->max('less_amt') > 0)
                <div class="ribbon ribbon-primary text-uppercase">Discount</div>
                @endif
                @endif
                @if($product->image->count() > 0)
                <img src="/uploads/product/{{$product->image[0]->image}}" alt="product" class="img-fluid">
                @endif
                <div class="hover-overlay d-flex align-items-center justify-content-center">
                  <div class="CTA d-flex align-items-center justify-content-center">
                    <a href="{{ url('product', [$product->id, make_slug($product->title)] )}}" class="visit-product active">
                      <i class="icon-search"></i>View
                    </a>
                  </div>
                </div>
              </div>
              <div class="title text-center">
                <a href="{{ url('product', [$product->id, make_slug($product->title)] )}}">
                  <h3 class="h6 text-uppercase no-margin-bottom">{{$product->title}}</h3>
                </a>
                @if($product->productDetail->count() == 1)
              <input type="text" id="product-size" value="{{$product->productDetail[0]->size_id}}" style="display: none;">
              <input type="text" id="detailsId" value="{{$product->productDetail[0]->id}}" style="display: none;">
              <input type="text" id="product-id" value="{{$product->id}}" style="display: none;">
                <span class="price text-muted">
                  Tk. {{$product->productDetail->max('sales_price')}}
                </span>
                <div class="text-center">
                  <button class="btn btn-template btn-sm wide addCart"><i class="icon-cart"></i> Add to Cart</button>
                </div>
                @elseif($product->productDetail->count() > 1)
                <span class="price text-muted">
                  Tk. {{$product->productDetail->min('sales_price')}}-{{$product->productDetail->max('sales_price')}}
                </span>
                @endif
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- Blog Section-->
    <section class="blog gray-bg">
      <div class="container">
        <header class="text-center">
          <h2 class="text-uppercase">Latest from the blog</h2>
        </header>
        <div class="row">
          <!-- post-->
          @foreach($blogs as $blog)
          <div class="col-lg-6">
            <div class="post post-gray d-flex align-items-center flex-md-row flex-column">
              <div class="thumbnail d-flex-align-items-center justify-content-center">
                <img src="/{{$blog->image}}" alt="..."></div>
              <div class="info"> 
                  <h4 class="h5"> 
                  <a href="{{ url('our-blog', [$blog->id, make_slug($blog->title)] )}}">{{$blog->title}}</a></h4>
                  <span class="date"><i class="fa fa-clock-o"></i>{{ $blog->created_at->format('j M Y') }}</span>
                  <p>{!! str_limit(strip_tags($blog->details), 130) !!} </p>
                  <a href="{{ url('our-blog', [$blog->id, make_slug($blog->title)] )}}" class="read-more">Read More<i class="fa fa-long-arrow-right"></i></a>
              </div>
            </div>
          </div>
          @endforeach
          <!-- /end post-->
        </div>
      </div>
    </section>
    <!-- Brands Section-->
<!--     <section class="brands">
      <div class="container">
        <div class="owl-carousel owl-theme brands-slider">
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="/frontend/img/brand-1.svg" alt="..." class="img-fluid"></div>
          </div>
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="/frontend/img/brand-2.svg" alt="..." class="img-fluid"></div>
          </div>
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="/frontend/img/brand-3.svg" alt="..." class="img-fluid"></div>
          </div>
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="/frontend/img/brand-4.svg" alt="..." class="img-fluid"></div>
          </div>
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="/frontend/img/brand-5.svg" alt="..." class="img-fluid"></div>
          </div>
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="/frontend/img/brand-6.svg" alt="..." class="img-fluid"></div>
          </div>
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="/frontend/img/brand-1.svg" alt="..." class="img-fluid"></div>
          </div>
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="/frontend/img/brand-2.svg" alt="..." class="img-fluid"></div>
          </div>
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="/frontend/img/brand-3.svg" alt="..." class="img-fluid"></div>
          </div>
          <div class="item d-flex align-items-center justify-content-center">
            <div class="brand d-flex align-items-center"><img src="/frontend/img/brand-4.svg" alt="..." class="img-fluid"></div>
          </div>
        </div>
      </div>
    </section> -->
    <div id="scrollTop"><i class="fa fa-long-arrow-up"></i></div>
@endsection