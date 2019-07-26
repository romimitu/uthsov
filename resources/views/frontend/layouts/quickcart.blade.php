<div id="shoppingcartbox" class="show">
    <div class="addToCart cartWidth" style="cursor: pointer">
            <span class="addToCartShow removeBtn" onclick="removeBtn()"><i class="fa fa-close"></i></span>
        <ul class="cartList" onclick="cartsWidget()">
            <li class="addToCartShow"><h3>your cart</h3></li>
            <li><i class="fa fa-shopping-cart" aria-hidden="true"></i><br>
                <span class="ng-binding">Item <span class="cartQty">{{array_sum(array_column($cart, 'quantity')) ?? 0}}</span></span>
            </li>
        </ul>
        <ul class="addToCart_price">
            <li class="addToCartShow">Total cost</li>
            <li style="font-size: 12px;color: white;" class="ng-binding"><span class="cartTotal">{{$total ?? 0}}</span> tk</li>
        </ul>
        <ul class="addToCart_item">
            @foreach($cart as $key=>$product)
            <li class="shopcartItem shoppingCart{{$product['id']}}">
                <input type="text" value="{{$product['id']}}" id="cartItemId" style="display: none;">
                <div class="total">
                    <figure>
                        <img src="/uploads/product/{{$product['image']}}">
                    </figure>
                    <div class="addToCartQuantityName">{{$product['quantity']}}</div>
                    <div class="addToCartProductName">
                        <p>{{$product['title']}}</p>
                        <span><span>{{$product['size']}}</span>/ {{$product['sale_price']}}</span>tk
                    </div>
                    <span class="addToCart_taka" style="font-size: 12px"><span class="ItemTotal">{{$product['quantity'] * $product['sale_price']}}</span>tk
                         <i class="fa fa-times" onclick="removeCart({{$product['id']}})" style="cursor: pointer"></i>
                    </span>
                </div>
            </li>
            @endforeach
        </ul>
        <a class="order_now addToCartShow" href="/checkout" style="text-decoration: none">order now</a>
    </div>
</div>