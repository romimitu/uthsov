@extends('frontend.layouts.layout')

@section('content')

    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Shop</h1>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
            <ul class="breadcrumb justify-content-lg-end">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Shop</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <main>
      <div class="container">
        <div class="row">
          <!-- Sidebar-->
          @include('frontend.layouts.sidebar')
          <!-- /Sidebar end-->
          <!-- Grid -->
          <div class="products-grid col-xl-9 col-lg-8 sidebar-left">
            <header class="d-flex justify-content-between align-items-start"><span class="visible-items">Showing <strong>1-{{$products->count()}} </strong> of <strong>{{$products->total()}} </strong>results</span>
          <!--     <select id="sorting" class="bs-select">
                <option value="newest">Newest</option>
                <option value="oldest">Oldest</option>
                <option value="lowest-price">Low Price</option>
                <option value="heigh-price">High Price</option>
              </select> -->
            </header>
            <div class="row">
              <!-- item-->
              @if($products->count()==0)
              <div class="item col-xl-12 col-md-12">
                <div class="title text-center">
                  <h3 class="h6 text-uppercase no-margin-bottom">Not found any Items with this criteria.</h3>
                </div>
              </div>
              @endif
              @foreach($products as $product)
              <div class="item col-xl-4 col-md-6">
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
                        <a href="{{ url('product', [$product->id, make_slug($product->title)] )}}" class="visit-product active"><i class="icon-search"></i>View</a>
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
            <nav aria-label="page navigation example" class="d-flex justify-content-center">
              <?php echo $products->render(); ?>
            </nav>
          </div>
          <!-- / Grid End-->
        </div>
      </div>
    </main>
    
@endsection

