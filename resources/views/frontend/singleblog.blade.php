@extends('frontend.layouts.layout')

@section('content')
    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>{{$blog->title}}</h1>
            <p class="author-date-top"> |  {{ $blog->created_at->format('M j, Y') }}</p>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
            <ul class="breadcrumb justify-content-lg-end">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('blog')}}">Blog</a></li>
              <li class="breadcrumb-item active">{{$blog->title}}</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="padding-small">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 col-lg-10">
            <div class="text-content"> 
              <p><img src="/{{$blog->image}}" alt="Example blog post alt" class="img-fluid"></p>
              <p>{!! $blog->details !!}</p>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection