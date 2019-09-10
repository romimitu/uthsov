@extends('frontend.layouts.layout')

@section('content')
<section class="hero hero-page gray-bg padding-small">
  <div class="container">
    <div class="row d-flex">
      <div class="col-lg-9 order-2 order-lg-1">
        <h1>Account Login</h1>
      </div>
      <div class="col-lg-3 text-right order-1 order-lg-2">
        <ul class="breadcrumb justify-content-lg-end">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Account Login</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="padding-small">
  <div class="container">
      <div class="card bg-light mb-3">
          <div class="card-header">You are ordering as a guest! For more benefit please login. <a href="{{ route('login') }}" class="btn btn-info btn-sm">Login</a></div>
        <div class="card-body">
          <div class="send-otp">
            <form action="javascript:;" method="post">
                <div class="form-group col-md-6 row">
                    <label>Enter Your Mobile Number for confirming order.</label>
                    <input type="text" pattern="\d*" id="txtMobile" name="mobile" class="form-control" maxlength="11" minlength="11" required>
                    <span class="text-danger" id="msg"></span>
                </div>

                <div class="form-group">
                  <button class="btn btn-success sendOtp" type="submit" onclick="sendOtp();">Send Code<i class="fa fa-angle-right"></i></button>
                </div>
            </form>
          </div>
          <div class="verify-otp none">
            <p>
              <span id="msg1"></span>
              <button class="btn btn-sm btn-warning sendOtp" type="submit"  onclick="sendOtp();">Send Code<i class="fa fa-angle-right"></i></button>
            </p>
            <form action="javascript:;" method="post">
                <div class="form-group col-md-6 row">
                    <label>Enter Verification Code</label>
                    <input type="text" pattern="\d*" id="txtCode" name="code" class="form-control" maxlength="6" minlength="6" required>
                    <span class="text-danger" id="msg2"></span>
                </div>

                <div class="form-group">
                  <button class="btn btn-template verifyOtp" type="submit" onclick="verifyOtp();">Verify<i class="fa fa-angle-right"></i></button>
                </div>
            </form>
          </div>
          <div id="verified" class="text-success"></div>
        </div>
     </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script>
  function sendOtp(){
    var mobile = $('#txtMobile').val();
    var code = Math.floor(100000 + Math.random() * 900000);


    var $this = $('.sendOtp');
    var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
    if ($this.html() !== loadingText) {
      $this.prop("disabled", true);
      $this.data('original-text', $this.html());
      $this.html(loadingText);
    }

    $.ajax({
        type: "POST",
        url: "/sendotp",
        data: { 
            "_token": "{{ csrf_token() }}",
            mobile: mobile,
            code: code,
        },
        success: function (data) {
          $(".send-otp").addClass('none');
          $(".verify-otp").removeClass('none');
          $("#msg1").html(`We've sent a 6-digit one time PIN in your phone +88${data.mobile}`);
          setTimeout(function() {
            $this.html($this.data('original-text'));
            $this.prop("disabled", false);
          }, 800)
          sendSms(data);
        },
        error: function (data) {
          console.log('Error:', data);
          $("#msg").html("Enter a valid mobile Number.");
          setTimeout(function() {
            $this.html($this.data('original-text'));
            $this.prop("disabled", false);
          }, 800)
        }
    });
  }
  function sendSms(data){
    var mobile="+88"+data.mobile;
    var message=`Your Uthsov.com One-time PIN is ${data.code}. It will expire in 10 minutes.`;
    $.ajax({
      type : "post",
      url : "http://www.bangladeshsms.com/smsapi",
      data : {
        "api_key" : "R60006925d052a0da7d402.89734832 ",
        "senderid" : "8804445629107",
        "type" : "text",
        "msg" : message,
        "contacts" : mobile
      }
    });
  }
  function verifyOtp(){
    var mobile = $('#txtMobile').val();
    var code = $('#txtCode').val();


    var $this = $('.verifyOtp');
    var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
    if ($this.html() !== loadingText) {
      $this.prop("disabled", true);
      $this.data('original-text', $this.html());
      $this.html(loadingText);
    }

    $.ajax({
        type: "GET",
        url: "/getotpcode",
        data: { 
            "_token": "{{ csrf_token() }}",
            mobile: mobile,
            code: code,
        },
        success: function (data) {
          if(data==''){
            $("#msg2").html("Your OTP Code not match! Try again..");
            setTimeout(function() {
              $this.html($this.data('original-text'));
              $this.prop("disabled", false);
            }, 800)            
          }else{
            updateOtp(data[0].id);
          }
        },
        error: function (data) {
          console.log('Error:', data);
          setTimeout(function() {
            $this.html($this.data('original-text'));
            $this.prop("disabled", false);
          }, 800)
        }
    });
  }

  function updateOtp(param){
    $.ajax({
        type: "POST",
        url: "/updateopt",
        data: { 
            "_token": "{{ csrf_token() }}",
            id: param,
        },
        success: function (data) {
          $(".verify-otp").addClass('none');
          $("#verified").html(`<p><a href="/checkout" class="btn btn-template">Verified Successfully. Continue to Checkout<i class="fa fa-angle-right"></i></a></p>`);
        },
        error: function (data) {
          console.log('Error:', data);
        }
    });
  }
</script>
@endsection
