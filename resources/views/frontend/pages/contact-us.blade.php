@extends('frontend.layouts.layout')

@section('content')

    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Contact Us</h1>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
            <ul class="breadcrumb justify-content-lg-end">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Contact Us</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <main class="contact-page">
      <!-- Contact page-->
      <section class="contact">
        <div class="container">
          <header>
            @if (Session::has('message'))
                <div class="text-center alert-danger">{{ Session::get('message') }}</div>
            @endif
            
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <p class="lead">
              Are you curious about something? Do you have some kind of problem with our products?
            </p>
          </header>
          <div class="row">
            <div class="col-md-4">
              <div class="contact-icon">
                <div class="icon icon-street-map"></div>
              </div>
              <h3>Address</h3>
              <p>{!! $aboutinfo[0]->address !!}</p>
            </div>
            <div class="col-md-4">
              <div class="contact-icon">
                <div class="icon icon-support"></div>
              </div>
              <h3>Call center</h3>
              <p><strong><a href="tel:{!! $aboutinfo[0]->mobile !!}">{!! $aboutinfo[0]->mobile !!}</a></strong></p>
            </div>
            <div class="col-md-4">
              <div class="contact-icon">
                <div class="icon icon-envelope"></div>
              </div>
              <h3>Electronic support</h3>
              <p>Please feel free to write an email to us.</p>
              <ul class="list-style-none">
                <li><strong><a href="mailto:{!! $aboutinfo[0]->email !!}">{!! $aboutinfo[0]->email !!}</a></strong></li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          <header class="mb-5">
            <h2 class="heading-line">Contact form</h2>
          </header>
          <div class="row">
            <div class="col-md-6">
              {!! Form::open(['url' => '/contact-us', 'method' =>'post', 'class'=>'custom-form form', 'enctype'=>"multipart/form-data"]) !!}
                <div class="controls">
                  <div class="form-group">
                    <label for="name" class="form-label">Your name *</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name" required="required" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="mobile" class="form-label">Your mobile *</label>
                    <input type="number" name="mobile" id="mobile" placeholder="Enter your  mobile" required="required" class="form-control" maxlength="11" minlength="10">
                  </div>
                  <div class="form-group">
                    <label for="email" class="form-label">Your email *</label>
                    <input type="email" name="email" id="email" placeholder="Enter your  email" required="required" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="message" class="form-label">Your message for us *</label>
                    <textarea rows="4" name="message" id="message" placeholder="Enter your message" required="required" class="form-control"></textarea>
                  </div>
                  {!! Form::submit('Send message ', ['class'=> 'btn btn-template']) !!}
                </div>
              {!! Form::close() !!}
            </div>
            <div class="col-md-6">
              {!! $aboutinfo[0]->map !!}
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection