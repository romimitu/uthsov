@extends('frontend.layouts.layout')

@section('content')

    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Shopping cart</h1>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
            <ul class="breadcrumb justify-content-lg-end">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Shopping cart</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- Shopping Cart Section-->
    <section class="shopping-cart">
      <div class="container">

        @if(empty($cart))
	      	<div class="col-lg-12 text-center CTAs">
	      		Your cart empty now. Please add some products to your cart. <a href="{{ route('shop.page') }}" class="btn btn-template btn-lg wide">Shop Now<i class="fa fa-long-arrow-right"></i></a>
	      	</div>
        @else
      	<table class="table">
      		<thead>
      			<tr>
      				<th>Product</th>
      				<th>Price</th>
      				<th>Quantity</th>
      				<th>Total</th>
      				<th>Remove</th>
      			</tr>
      		</thead>
      		<tbody id="tbody">
              @foreach($cart as $key=>$product)
              	<tr class="cart-item-{{$product['id']}}">
              		<td>
              			<a href="{{ url('product', [$product['product_id'], make_slug($product['title'])] )}}">
	                      	<h5>{{$product['title']}}</h5>
	                      	<span class="text-muted">Size: {{$product['size']}}</span>
                  		</a>
              		</td>
          			<td id="sale_price">৳<span>{{$product['sale_price']}}</span></td>
              		<td>
	                    <div class="d-flex align-items-center">
	                      <div class="quantity d-flex align-items-center">
	                        <div class="dec-btn">-</div>
	                        <input type="text" value="{{$product['quantity']}}" class="quantity-no txtQty">
	                        <div class="inc-btn">+</div>
	                      </div>
	                    </div>
                	</td>
              		<td id="total_price">৳<span>{{$product['total_price']}}</span></td>
              		<td><i class="delete fa fa-trash" onclick="removeCart({{$product['id']}})"></i></td>
              	</tr>
              @endforeach
      		</tbody>
      		<tfoot>
      			<tr>
      				<th colspan="3" class="text-right"><span>Total</span></th>
      				<th>৳<strong class="text-primary price-total" id="Total"></strong></th>
      			</tr>
      		</tfoot>
      	</table>
        <!-- <div class="CTAs d-flex align-items-center justify-content-center justify-content-md-end flex-column flex-md-row">
        	<a href="{{route('shop.page')}}" class="btn btn-template-outlined wide">Continue Shopping</a>
        	<a href="javascript:;" class="btn btn-template wide">Update Cart</a>
        </div> -->
      	<div class="col-lg-12 text-center CTAs">
      		<a href="{{ route('cart.checkout') }}" class="btn btn-template btn-lg wide">Proceed to checkout<i class="fa fa-long-arrow-right"></i></a>
      	</div>
      	@endif
  	</div>
    </section>
@endsection


@section('script')
<script>
	function sumColumn(index) {
	    var total = 0;
	    $("table #tbody td:nth-child(" + index + ") span").each(function () {
	        total += parseFloat($(this).text(), 10) || 0;
	    });
	    return total.toFixed(2);
	}
	$(document).ready(function () {
        $(document).on("keyup change", ".txtQty", calculateGrid);
        $(document).on("click", ".inc-btn, .dec-btn", calculateGrid);
		$("#Total").text(sumColumn(4));

	});
	function calculateGrid(){
        $(".txtQty").each(function () {
            if (!isNaN(this.value) && this.value.length != 0) {
		    	qty= parseFloat($(this).val());
		    	price = parseFloat($(this).closest('tr').find("#sale_price span").text());
		        $(this).closest('tr').find("#total_price span").text((qty*price).toFixed(2));
            }
        });
		$("#Total").text(sumColumn(4));
	}

	function removeCart(param) {
		var product_id = param;
		var url = "{{ route('cart.remove') }}";
		$.ajax({
			type: "POST",
			url: url,
			data: { 
			  "_token": "{{ csrf_token() }}",
			  product_id: product_id 
			},
			success: function (data) {
				$(".cart-item-"+product_id).closest('tr').fadeOut(500,function(){ 
                    $(this).remove();
                    $("#Total").text(sumColumn(4));
                }); 
			},
			error: function (data) {
			  console.log('Error:', data);
			}
		});
	};
</script>
@endsection

