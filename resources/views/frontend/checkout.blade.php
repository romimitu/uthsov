@extends('frontend.layouts.layout')

@section('content')

    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Checkout</h1>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
            <ul class="breadcrumb justify-content-lg-end">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Checkout</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- Checkout Forms-->
    <section class="checkout">
      <div class="container">

        @if(empty($cart))
	      	<div class="col-lg-12 text-center CTAs">
	      		Your cart empty now. Please add some products to your cart. <a href="{{ route('shop.page') }}" class="btn btn-template btn-lg wide">Shop Now<i class="fa fa-long-arrow-right"></i></a>
	      	</div>
        @else

		@guest()
        	<div class="col-lg-12">
        		<div class="block-header mb-5">
					     <p>You are ordering as a guest! For more benefit please register as a member or already a member please login. <a href="{{ route('login') }}" class="btn btn-template-outlined btn-sm">Login</a></p>
          	</div>
		     </div>
		@endguest

        @if (Session::has('message'))
        	<div class="col-sm-12">
	            <div class="text-center alert-danger">{{ Session::get('message') }}</div>
	        </div>
        @endif


        @if (count($errors) > 0)
            <div class="col-sm-12">
            	<div class="alert alert-danger">
	                <ul>
	                    @foreach ($errors->all() as $error)
	                        <li>{{ $error }}</li>
	                    @endforeach
	                </ul>
	            </div>
            </div>
        @endif
        <div class="row">
          <div class="col-lg-8">
            <form action="{{ route('order') }}" method="post">
            	@csrf
              	<!-- Invoice Address-->
              	<div class="block-header mb-5">
                	<h6>Invoice address</h6>
              	</div>
              	<div class="row">
                	<div class="form-group col-md-6">
	                  	<label class="form-label">Full Name*</label>
						<input type="text" name="customer_name" class="form-control" value="{{ Auth::check() ? auth()->user()->name : old('customer_name') }}" required>
                	</div>
	                <div class="form-group col-md-6">
	                  	<label class="form-label">Mobile No*</label>
						<input type="text" name="customer_mobile" class="form-control" value="{{ Auth::check() ? auth()->user()->mobile : old('customer_mobile') }}" required minlength="11" maxlength="11">
	                </div>
	                <div class="form-group col-md-6">
	                  	<label class="form-label">Email Address</label>
						<input type="email" name="customer_email" value="{{Auth::check() ? auth()->user()->email : old('customer_email')}}" class="form-control">
	                </div>
                  <div class="form-group col-md-6">
                      <label class="form-label">City*</label>
            <select name="city" class=" form-control" id="txtCity" onchange="getZoneInfo()" required>
              <option value="">Select</option>
              @foreach($city as $name)
              <option value="{{$name->city}}">{{$name->city}}</option>
              @endforeach
            </select>
                  </div>
	                <div class="form-group col-md-12">
	                  	<label class="form-label">Full Address*</label>
						<input type="text" name="address" class="form-control" value="{{old('address')}}" placeholder="House No, Street No" required>
	                </div>
					<input type="text" name="shippingfee" id="shippingfee" value="0.00" style="display: none;">
              	</div>
              <!-- /Invoice Address-->
				@guest()
              	<div class="row">
	                <div class="form-group col-12 mt-3 ml-3">
	                  <input id="another-address" type="checkbox" name="register" class="checkbox-template">
	                  <label for="another-address" data-toggle="collapse" data-target="#shippingAddress" aria-expanded="false" aria-controls="shippingAddress">Register as a member!</label>
	                </div>
              	</div>
              	<div id="shippingAddress" aria-expanded="false" class="collapse">
	                <div class="block-header mb-5 mt-3">
	                  <h6>User Info</h6>
	                </div>
	                <div class="row">
	                  <div class="form-group col-md-6">
	                    <label  class="form-label">Password</label>
	                    <input type="text" name="password" placeholder="Enter password" class="form-control">
	                  </div>
	                </div>
              	</div>
				@endguest
              <!-- Shippping Address-->
              	<div class="row">
	                <div class="form-group col-12 mt-3 ml-3">
                        <input type="radio" name="shippping" id="payment-method-2" class="radio-template" checked>
                        <label for="payment-method-2"><strong>Pay on Delivery</strong></label>
	                </div>
	                <div class="form-group col-12 mt-3 ml-3">
	                  <input id="accept-terms" type="checkbox" name="accept-terms" required>
	                  <label for="accept-terms">I accept terms and conditions!</label>
	                </div>
              	</div>
          	  	<div class="CTAs d-flex justify-content-between flex-column flex-lg-row">
					<button class="btn btn-template wide next" type="submit">Confirm Your Order<i class="fa fa-angle-right"></i></button>
          	  	</div>
              <!-- /Shipping Address-->
        	</form>
          </div>
          <div class="col-lg-4">
            <div class="block-body order-summary">
              <h6 class="text-uppercase">Order Summary</h6>
              <p>Shipping and additional costs are calculated based on values you have entered. For shipping outside dhaka extra courier charge will be add.</p>
              <ul class="order-menu list-unstyled">
                <li class="d-flex justify-content-between"><span>Order Subtotal </span><strong id="item-total">{{$total}}</strong></li>
                <li class="d-flex justify-content-between"><span>Shipping and handling</span><strong id="shipping-fee">0.00</strong></li>
                <li class="d-flex justify-content-between"><span>Vat</span><strong id="tax">0.00</strong></li>
                <li class="d-flex justify-content-between"><span>Total</span><strong class="text-primary price-total" id="grand-total"></strong></li>
              </ul>
            </div>
          </div>
        </div>
        @endif
      </div>
    </section>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        totalCheckoutPrice();
    });

    function getZoneInfo(){
    	var zone = $('#txtCity').val();
        var url = "{{ route('shipping.fee') }}";
        $.ajax({
            type: "GET",
            url: url,
            data: { 
                "_token": "{{ csrf_token() }}",
                id: zone,
            },
            success: function (data) {
              var total=parseFloat($('#grand-total').text());
              if(total<{{$aboutinfo[0]->free_ship_upto}}){
                $('#shipping-fee').text(data[0].fee);
                $('#shippingfee').val(data[0].fee);
                totalCheckoutPrice();
              }
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }

    function totalCheckoutPrice(){
    	itemTotal = parseFloat($('#item-total').text());
    	fee = parseFloat($('#shipping-fee').text());
    	tax = parseFloat($('#tax').text());
    	$('#grand-total').text((itemTotal+fee+tax).toFixed(2))
    }
</script>
@endsection

