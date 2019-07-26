<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UTHSOV - Your Dream. Our Team</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/frontend/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/frontend/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="/frontend/vendor/bootstrap-select/css/bootstrap-select.min.css">
    <!-- Price Slider Stylesheets -->
    <link rel="stylesheet" href="/frontend/vendor/nouislider/nouislider.css">
    <!-- Custom font icons-->
    <link rel="stylesheet" href="/frontend/css/custom-fonticons.css">
    <!-- Google fonts - Poppins-->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <!-- owl carousel-->
    <link rel="stylesheet" href="/frontend/vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="/frontend/vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/frontend/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/frontend/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/frontend/img/favicon.ico">
    <!-- Modernizr-->
    <script src="/frontend/js/modernizr.custom.79639.js"></script>
</head>
<body>
    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')


    <script src="/frontend/vendor/jquery/jquery.min.js"></script>
    <script src="/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/frontend/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/frontend/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="/frontend/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
    <script src="/frontend/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="/frontend/vendor/nouislider/nouislider.min.js"></script>
    <script src="/frontend/vendor/jquery-countdown/jquery.countdown.min.js"></script>
    <script src="/frontend/vendor/masonry-layout/masonry.pkgd.min.js"></script>
    <script src="/frontend/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <!-- masonry -->
    <script>
      $(function(){
          var $grid = $('.masonry-wrapper').masonry({
              itemSelector: '.item',
              columnWidth: '.item',
              percentPosition: true,
              transitionDuration: 0,
          });
      
          $grid.imagesLoaded().progress( function() {
              $grid.masonry();
          });
      })
      
      
    </script>
    <script>
        function cartsWidget(){
          $('.addToCartShow, .addToCart_item').css('display','block');
          $('.addToCart').removeClass('cartWidth')
          $('.addToCart').addClass('AddToCartWidth')
        }
        function removeBtn(){console.log('as');
          $('.addToCartShow, .addToCart_item').css('display','none');
          $('.addToCart').removeClass('AddToCartWidth')
          $('.addToCart').addClass('cartWidth')
        }


        $('.addCart').on('click', function(){
          if($('#product-size').val() == 0){
            $('#txtSizeCheck').html('Please Select Size First.')
          }else{
              var $this = $(this);
              $('#txtSizeCheck').html('')
              var product_id = $this.closest('.item').find('#product-id').val();
              var size_id = $this.closest('.item').find('#product-size').val();
              var url = "{{ route('cart.add') }}";
              $.ajax({
                  type: "POST",
                  url: url,
                  data: { 
                      "_token": "{{ csrf_token() }}",
                      product_id: product_id,
                      size_id:size_id
                  },
                  success: function (data,i) {
                    var tbarcode= '';
                    var product = data.cart[$this.closest('.item').find('#detailsId').val()];
                    var itemId = parseFloat(product.id);
                    var qty = parseFloat(product.quantity);
                    var netPrice = qty*product.sale_price;
                    var rows = '<li class="shopcartItem shoppingCart'+product.id+'">'
                      +'<input type="text" value="'+product.id+'" id="cartItemId" style="display: none;">'
                      +'<div class="total"><figure><img src="/uploads/product/'+product.image+'"></figure>'
                      +'<div class="addToCartQuantityName">'+qty+'</div>'
                      +'<div class="addToCartProductName"><p>'+ product.title+'</p>'
                      +'<span><span>'+ product.size+'</span>/ '+product.sale_price+'tk</span></div>'
                      +'<span class="addToCart_taka" style="font-size: 12px"><span class="ItemTotal">'+netPrice+'</span>tk'
                      +'<i class="fa fa-times" onclick="removeCart('+product.id+')"></i></span>'
                      +'</div></li>';



                    $(".shopcartItem").each(function () {
                        tbarcode = parseFloat($(this).find('#cartItemId').val());
                        if (tbarcode == itemId) {
                            $(this).find('.addToCartQuantityName').text(qty);
                            $(this).find('.ItemTotal').text(netPrice);
                            return false;
                        }
                    });
                    if (tbarcode != itemId) {
                        $('.addToCart_item').append(rows);
                    }
                    $(".cartTotal").text(sumPrice());
                    $(".cartQty").text(sumQty());
                  },
                  error: function (data) {
                      console.log('Error:', data);
                  }
              });
          }
        })

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
                    $('li.shoppingCart'+product_id).remove();
                    $('.cartTotal').text(sumPrice());
                    $('.cartQty').text(sumQty());
                },
                error: function (data) {
                  console.log('Error:', data);
                }
            });
        };
        function sumPrice(){
            var sum = 0;
            $('.shopcartItem .ItemTotal').each(function() {
              sum += +parseFloat($(this).text())||0;
            });
            return sum.toFixed(2);
        }
        function sumQty(){
            var sum = 0;
            $('.shopcartItem .addToCartQuantityName').each(function() {
              sum += +parseFloat($(this).text())||0;
            });
            return sum;
        }
    </script>
    <!-- Main Template File-->
    <script src="/frontend/js/front.js"></script>
  
  @yield('script')
</body>
</html>