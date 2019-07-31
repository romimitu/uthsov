@extends('frontend.layouts.layout')

@section('content')

    <section class="hero hero-page gray-bg padding-small">
      <div class="container">
        <div class="row d-flex">
          <div class="col-lg-9 order-2 order-lg-1">
            <h1>Photo Gallery</h1>
          </div>
          <div class="col-lg-3 text-right order-1 order-lg-2">
            <ul class="breadcrumb justify-content-lg-end">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Gallery</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="blog">
      <div class="container">
        <div class="row">
          <!-- post-->

          @foreach($photos as $photo)
          <div class="col-lg-3">
            <div class="post post-gray">
              <div class="thumbnail">
                <a href="/{{$photo->image}}" data-lightbox="{{$photo->title}}" data-title="{{$photo->title}}"><img src="/{{$photo->image}}" class="img-responsive"></a>
              </div>
            </div>
          </div>
          @endforeach

          
          
        </div>
        <!-- Pagination -->
        <nav class="d-block w-100">
            <?php echo $photos->render(); ?>
        </nav>
      </div>
    </section>
@endsection