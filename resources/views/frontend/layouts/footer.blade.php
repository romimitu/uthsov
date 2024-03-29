
    <footer class="main-footer">
      <!-- Service Block-->
      <div class="services-block">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 d-flex justify-content-center justify-content-lg-start">
              <div class="item d-flex align-items-center">
                <div class="icon"><i class="icon-truck"></i></div>
                <div class="text">
                  <h6 class="no-margin text-uppercase">Free shipping &amp; return</h6><span>Free Shipping over {!! $aboutinfo[0]->free_ship_upto !!} Tk</span>
                </div>
              </div>
            </div>
            <div class="col-lg-4 d-flex justify-content-center">
              <div class="item d-flex align-items-center">
                <div class="icon">৳</div>
                <div class="text">
                  <h6 class="no-margin text-uppercase">Money back guarantee</h6><span>30 Days Money Back Guarantee</span>
                </div>
              </div>
            </div>
            <div class="col-lg-4 d-flex justify-content-center">
              <div class="item d-flex align-items-center">
                <div class="icon"><i class="icon-headphones"></i></div>
                <div class="text">
                  <h6 class="no-margin text-uppercase"><a href="tel:{{$aboutinfo[0]->mobile}}">{{$aboutinfo[0]->mobile}}</a></h6><span>24/7 Available Support</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Main Block -->
      <div class="main-block">
        <div class="container">
          <div class="row">
            <div class="info col-lg-4">
              <div class="logo"><img src="/{{$aboutinfo[0]->footer_logo}}" alt="Uthsov" height="73"></div>
              <p>We are committed to Deliver organic and natural products to your door.</p>
              <ul class="social-menu list-inline">
                <li class="list-inline-item"><a href="{{$aboutinfo[0]->twitter}}" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="{{$aboutinfo[0]->facebook}}" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="{{$aboutinfo[0]->instagram}}" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="{{$aboutinfo[0]->youtube}}" target="_blank" title="youtube"><i class="fa fa-youtube"></i></a></li>
              </ul>
            </div>
            <div class="site-links col-lg-2 col-md-6">
              <h5 class="text-uppercase">Shop</h5>
              <ul class="list-unstyled">
                <li> <a href="/shop">Shop</a></li>
                <li> <a href="/how-to-order">How To Order</a></li>
                <li> <a href="/terms-conditions">Terms & Conditions</a></li>
                <li> <a href="/next-day-policy">Next Day Policy</a></li>
              </ul>
            </div>
            <div class="site-links col-lg-2 col-md-6">
              <h5 class="text-uppercase">Company</h5>
              <ul class="list-unstyled">
                <li> <a href="/about-us">About Us</a></li>
                <li> <a href="/login">Login</a></li>
                <li> <a href="/register">Register</a></li>
                <li> <a href="/cart">Cart</a></li>
              </ul>
            </div>
            <div class="newsletter col-lg-4">
              <h5 class="text-uppercase">Daily Offers & Discounts</h5>
              <form action="#" id="newsletter-form">
                <div class="form-group">
                  <input type="email" name="subscribermail" placeholder="Your Email Address">
                  <button type="submit"> <i class="fa fa-paper-plane"></i></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights">
        <div class="container">
          <div class="row">
            <div class="text col-md-6">
              <p>&copy; 2019 <a href="/" target="_blank">Uthsov IT.</a> All rights reserved.</p>
            </div>
            <div class="payment col-md-6 clearfix">
              <div class="pull-right">
              <small>Design & Develop By <a href="https://facebook.com/romi.mitu" target="_blank">RoMi</a></small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>