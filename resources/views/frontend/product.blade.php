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
              <div class="item col-xl-3 col-md-6">
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

                <div class="overlay">
                  @if($product->productDetail->count() > 0) 
                  <div class="divoverlay addCart">
                      <h4 class="addtocartshow show">Add To Cart</h4>
                  </div>
                  @endif
                  <a class="btnshow" href="{{ url('product', [$product->id, str_slug($product->title)] )}}" >Show Details</a>
                </div>
              </div>
              <div class="title text-center">
                <a href="{{ url('product', [$product->id, str_slug($product->title)] )}}">
                  <h3 class="h6 no-margin-bottom">{{$product->title}}</h3>
                </a>
                <!--<small class="text-muted">Brand: {{$product->brand->name}}</small>-->@if($product->productDetail->count() == 0)
                <p class="p-info">
                    <a href="tel:+8801920225330"><span class="addToCartDiscountPrice price-new text-center ">Call for Details</span></a>
                </p>
                @endif
                @if($product->productDetail->count() == 1)
                <input type="text" id="product-size" value="{{$product->productDetail[0]->size_id}}" style="display: none;">
                <input type="text" id="detailsId" value="{{$product->productDetail[0]->id}}" style="display: none;">
                <input type="text" id="product-id" value="{{$product->id}}" style="display: none;">
                <p class="measurement-tag">{{$product->productDetail[0]->size->name}}</p>
                <p class="p-info">
                    <span class="addToCartDiscountPrice price-new text-center ">{{number_format($product->productDetail->max('sales_price'),0)}}tk</span>
                </p>
                <p class="add-to-cart">
                    <span><i class="fa fa-shopping-cart awesome"></i></span>
                    <span class="shopping-cart-quantityShow hide"> </span>
                    <span class="cart_text addCart">Add to cart</span>
                </p>

                @elseif($product->productDetail->count() > 1)
                <span class="price text-muted">
                  Tk. {{number_format($product->productDetail->min('sales_price'),0)}}-{{number_format($product->productDetail->max('sales_price'),0)}}
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
    @include('frontend.layouts.quickcart')
    
@endsection

