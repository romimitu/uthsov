@extends('frontend.layouts.layout')

@section('content')

    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Our Blog</h1>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
            <ul class="breadcrumb justify-content-lg-end">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Blog</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="blog">
      <div class="container">
        <div class="row">
          <!-- post-->

          @foreach($blogs as $blog)
          <div class="col-lg-6">
            <div class="post post-gray d-flex align-items-center flex-md-row flex-column">
              <div class="thumbnail d-flex-align-items-center justify-content-center">
                <img src="/{{$blog->image}}" alt="..."></div>
              <div class="info"> 
                  <h4 class="h5"> 
                  <a href="{{ url('our-blog', [$blog->id, make_slug($blog->title)] )}}">{{$blog->title}}</a></h4>
                  <span class="date"><i class="fa fa-clock-o"></i>{{ $blog->created_at->format('j M Y') }}</span>
                  <p>{!! str_limit(strip_tags($blog->details), 130) !!} </p>
                  <a href="{{ url('our-blog', [$blog->id, make_slug($blog->title)] )}}" class="read-more">Read More<i class="fa fa-long-arrow-right"></i></a>
              </div>
            </div>
          </div>
          @endforeach

          
          
        </div>
        <!-- Pagination -->
        <nav class="d-block w-100">
            <?php echo $blogs->render(); ?>
        </nav>
      </div>
    </section>
@endsection