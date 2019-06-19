@extends('frontend.layouts.layout')

@section('content')
<section class="hero hero-page gray-bg padding-small">
  <div class="container">
    <div class="row d-flex">
      <div class="col-lg-9 order-2 order-lg-1">
        <h1>How to order</h1>
      </div>
      <div class="col-lg-3 text-right order-1 order-lg-2">
        <ul class="breadcrumb justify-content-lg-end">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">How to order</li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section class="padding-small">
  <div class="container">
    <div class="row">
        <div class="block-header mb-5">
          <h5>A product Order</h5>
        </div>
        <ul>
          <li>First Click on add to cart button.</li>
          <li>Then go to cart page or checkout page.</li>
          <li>Fill up the chechout form with order info.</li>
          <li>In checkout page you can tik checkbox for register as a new customer.</li>
          <li>Then click confirm order button</li>
        </ul>
      </div>
    </div>
  </div>
</section>

@endsection

