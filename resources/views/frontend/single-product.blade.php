@extends('frontend.layouts.layout')

@section('content')
<style>
    b, strong {font-weight: bold;}
</style>
    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>{{$item->title}}</h1>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
            <ul class="breadcrumb justify-content-lg-end">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/shop">Shop</a></li>
              <li class="breadcrumb-item active">{{$item->title}}</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="product-details">
      <div class="container">
        <div class="row">
          <div class="product-images col-lg-6">
            @if($item->productDetail->count() > 0)
            @if($item->productDetail->max('less_amt') > 0)
            <div class="ribbon-primary text-uppercase">Discount</div>
            @endif
            @endif
            <div data-slider-id="1" class="owl-carousel items-slider owl-drag">
            @foreach($item->image as $image)
              <div class="item"><img src="/uploads/product/{{$image->image}}" alt="shirt"></div>
            @endforeach
            </div>
            <div data-slider-id="1" class="owl-thumbs">
            @foreach($item->image as $image)
              <button class="owl-thumb-item"><img src="/uploads/product/{{$image->image}}" alt="shirt"></button>
            @endforeach
            </div>
          </div>
          <div class="details item col-lg-6">
            <dl class="row">
			  <dt class="col-sm-3"><strong>Price:</strong></dt>
			  <dd class="col-sm-9">
            <ul class="price list-inline no-margin">
                <li class="list-inline-item current">
                @if($item->productDetail->count() == 1)
                  Tk. {{number_format($item->productDetail->max('sales_price'),0)}}
                @elseif($item->productDetail->count() == 0)
                <a href="tel:+8801920225330">Call for Details</a>
                @elseif($item->productDetail->count() > 1)
          Tk. {{number_format($item->productDetail->min('sales_price'),0)}} - {{number_format($item->productDetail->max('sales_price'),0)}}
                @endif
                </li>
                <li class="list-inline-item original">
			          </li>
            </ul>
			  </dd>

			  <dt class="col-sm-3"><strong>Code:</strong></dt>
			  <dd class="col-sm-9"><u><b>{{$item->sku}}</b></u></dd>

			  <dt class="col-sm-3">Category:</dt>
			  <dd class="col-sm-9">{{$item->category->name}} </dd>

			  <dt class="col-sm-3">Brand:</dt>
			  <dd class="col-sm-9">{{$item->brand->name}} </dd>

			  <dt class="col-sm-3">Color:</dt>
			  <dd class="col-sm-9">{{$item->color->name}} </dd>
			  
            @if($item->productDetail->count() == 1)
			  <dt class="col-sm-3">Size:</dt>
			  <dd class="col-sm-9">{{$item->productDetail[0]->size->name}} </dd>
            @endif
			</dl>
			<!-- <div class="review d-flex align-items-center">
                <ul class="rate list-inline">
                  <li class="list-inline-item"><i class="fa fa-star text-primary"></i></li>
                  <li class="list-inline-item"><i class="fa fa-star text-primary"></i></li>
                  <li class="list-inline-item"><i class="fa fa-star text-primary"></i></li>
                  <li class="list-inline-item"><i class="fa fa-star text-primary"></i></li>
                  <li class="list-inline-item"><i class="fa fa-star-o text-primary"></i></li>
                </ul><span class="text-muted">5 reviews</span>
          	</div> -->
            <p>{!! $item->description !!}</p>

            @if($item->productDetail->count() == 1)
              <input type="text" id="product-size" value="{{$item->productDetail[0]->size_id}}" style="display: none;">
              <input type="text" id="detailsId" value="{{$item->productDetail[0]->id}}" style="display: none;">
              <input type="text" id="product-id" value="{{$item->id}}" style="display: none;">
            @elseif($item->productDetail->count() > 1)
            <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
             <!--  <div class="quantity d-flex align-items-center">
                <div class="dec-btn">-</div>
                <input type="text" value="1" class="quantity-no">
                <div class="inc-btn">+</div>
              </div> -->
              <input type="text" id="detailsId" style="display: none;">
              <select id="product-size" class="bs-select">
                <option value="0">Select Size</option>
              	@foreach($sizes as $size)
                <option value="{{$size->id}}">{{$size->name}}</option>
                @endforeach
              </select>
              <span class="text-danger" id="txtSizeCheck"></span>
            </div>
            @endif
            @if($item->productDetail->count() > 0)
            <ul class="CTAs list-inline">
              <li class="list-inline-item">
                <button class="btn btn-template wide addCart"><i class="icon-cart"></i> Add to Cart</button>
              </li>
              <span id="alert"></span>
            </ul>
            @endif
          </div>
        </div>
      </div>
    </section>
    <section class="product-description no-padding">
      <!-- <div class="container">
        <ul role="tablist" class="nav nav-tabs flex-column flex-sm-row">
          <li class="nav-item"><a data-toggle="tab" href="#description" role="tab" class="nav-link active">Description</a></li>
          <li class="nav-item"><a data-toggle="tab" href="#additional-information" role="tab" class="nav-link">Additional Information</a></li>
          <li class="nav-item"><a data-toggle="tab" href="#reviews" role="tab" class="nav-link">Reviews</a></li>
        </ul>
        <div class="tab-content">
          <div id="description" role="tabpanel" class="tab-pane active">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. LOLUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. LOLDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. LOLUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. LOLDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div id="additional-information" role="tabpanel" class="tab-pane">
            <table class="table">
              <tbody>
                <tr>
                  <th class="border-0">Material:</th>
                  <td class="border-0">Cotton</td>
                </tr>
                <tr>
                  <th>Styles:</th>
                  <td>Casual</td>
                </tr>
                <tr>
                  <th>Properties:</th>
                  <td>Short Sleeve</td>
                </tr>
                <tr>
                  <th>Brand:</th>
                  <td>Calvin Klein</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div id="reviews" role="tabpanel" class="tab-pane">
            <div class="row">
              <div class="col-xl-9">
                <div class="row review">
                  <div class="col-3 text-center"><img src="/frontend/img/person-1.jpg" alt="Han Solo" class="review-image"><span class="text-uppercase text-muted text-small">Dec 2018</span></div>
                  <div class="col-9 review-text">
                    <h6>Han Solo</h6>
                    <div class="mb-2"><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i>
                    </div>
                    <p class="text-muted text-small">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections</p>
                  </div>
                </div>
                <div class="row review">
                  <div class="col-3 text-center"><img src="/frontend/img/person-2.jpg" alt="Luke Skywalker" class="review-image"><span class="text-uppercase text-muted text-small">Dec 2018</span></div>
                  <div class="col-9 review-text">
                    <h6>Luke Skywalker</h6>
                    <div class="mb-2"><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star-o text-primary"></i>
                    </div>
                    <p class="text-muted text-small">The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. &quot;What's happened to me?&quot; he thought. It wasn't a dream.</p>
                  </div>
                </div>
                <div class="row review">
                  <div class="col-3 text-center"><img src="/frontend/img/person-3.jpg" alt="Princess Leia" class="review-image"><span class="text-uppercase text-muted text-small">Dec 2018</span></div>
                  <div class="col-9 review-text">
                    <h6>Princess Leia</h6>
                    <div class="mb-2"><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star-o text-primary"></i><i class="fa fa-star-o text-primary"></i>
                    </div>
                    <p class="text-muted text-small">His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table.</p>
                  </div>
                </div>
                <div class="row review">
                  <div class="col-3 text-center"><img src="/frontend/img/person-4.jpg" alt="Jabba Hut" class="review-image"><span class="text-uppercase text-muted text-small">Dec 2018</span></div>
                  <div class="col-9 review-text">
                    <h6>Jabba Hut</h6>
                    <div class="mb-2"><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i>
                    </div>
                    <p class="text-muted text-small">Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <div class="container-fluid">
        <div class="share-product gray-bg d-flex align-items-center justify-content-center flex-column flex-md-row"><strong class="text-uppercase">Share this on</strong>
          <ul class="list-inline text-center">
            <li class="list-inline-item"><a href="#" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </section>
    <section class="related-products">
      <div class="container">
        <header class="text-center">
          <h2>You may also like</h2>
        </header>
        <div class="row">
          <!-- item-->
          @foreach($products as $product)
          <div class="item col-lg-3">
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
      </div>
    </section>
    @include('frontend.layouts.quickcart')
@endsection


@section('script')
<script>
    $('#product-size').on('change',function() {
        var size_id = $('#product-size').val();
        var product_id = {{$item->id}};
        var url = "{{ route('itemby.size') }}";
        $.ajax({
            type: "GET",
            url: url,
            data: { 
              "_token": "{{ csrf_token() }}",
              product_id: product_id,
              size_id:size_id
            },
            success: function (data) {
                $('li.current').html('$ '+parseFloat(data[0].sales_price-data[0].less_amt));
                $('li.original').html('$ '+data[0].less_amt);
                $('#detailsId').val(data[0].id);
            },
            error: function (data) {
              console.log('Error:', data);
            }
        });
    });
</script>
@endsection