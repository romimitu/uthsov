
 <div class="cart dropdown show">
    <a id="cartdetails" href="javascript:;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
        <i class="icon-cart"></i>
        <div class="cart-no">{{array_sum(array_column($cart, 'quantity'))}}</div>
    </a>
    <a href="{{ route('cart.show') }}" class="text-primary view-cart">View Cart</a>
    <div aria-labelledby="cartdetails" class="dropdown-menu">
        <div class="quick-cart-body">
            @foreach($cart as $key=>$product)
            <div class="dropdown-item cart-product" id="cart-items-{{$product['id']}}">
                <div class="d-flex align-items-center">
                    <div class="details d-flex justify-content-between">
                        <div class="text">
                            <a href="{{ url('product', [$product['product_id'], make_slug($product['title'])] )}}"><strong>{{$product['title']}}</strong></a>
                            <small>Quantity: <b class="qty">{{$product['quantity']}}</b> Size: <b>{{$product['size']}}</b></small>
                            <span class="price">Tk. <b class="netPrice">{{$product['quantity'] * $product['sale_price']}}</b></span>
                        </div>
                        <input type="text" value="{{$product['id']}}" id="cartItemId" style="display: none;">
                        <a href="javascript:;" onclick="removeCart({{$product['id']}});" class="delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="dropdown-item total-price d-flex justify-content-between">
            <span>Total</span><strong class="text-primary grandTotal">Tk. {{number_format($total,2)}}</strong>
        </div>
        <div class="dropdown-item CTA d-flex">
            <a href="{{ route('cart.show') }}" class="btn btn-template wide">View Cart</a>
            <a href="{{ route('cart.checkout') }}" class="btn btn-template wide">Checkout</a>
        </div>
    </div>
</div>