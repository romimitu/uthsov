@extends('frontend.layouts.layout')

@section('content')


    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>About us</h1>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
            <ul class="breadcrumb justify-content-lg-end">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">About us</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- about us-->
    <section class="padding-small">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h2>Who we are</h2>
            <p class="text-muted">{!! $aboutinfo[0]->about !!}</p>
          </div>
          <div class="col-sm-6 d-none d-sm-flex align-items-center">
            <div class="about-icon ml-lg-0">
            <img class="img-responsive" src="{{$aboutinfo[0]->about_img}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-sm-3 d-none d-sm-flex align-items-center">
            <div class="about-icon"><i class="icon icon-truck"></i></div>
          </div>
          <div class="col-lg-9 col-sm-9">
            <h2>Mission & Vision</h2>
            <p class="text-muted">{!! $aboutinfo[0]->mission_vision !!}</p>
          </div>
        </div>
      </div>
@endsection


