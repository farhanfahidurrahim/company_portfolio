@extends('frontend.layouts.master')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h4>Album</h4>
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Album</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="px-lg-5">
                <!-- For demo purpose -->
                <div class="row py-5">
                    <div class="col-lg-12 mx-auto">
                        <h4>All Album List On Gallery</h4>
                        {{-- <p>Bootstrap photogallery snippet.</p> --}}
                    </div>
                </div>
                <!-- End -->

                <div class="row">

                    <!-- Gallery item -->
                    @foreach ($albums as $item)
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                        <div class="bg-white rounded shadow-sm"><img src="{{ $item->thumbnail }}" alt="" class="img-fluid card-img-top">
                        <div class="p-4">
                            <h5> <a href="{{ route('album.image',$item->id) }}" class="text-dark">{{ $item->title }}</a></h5>
                            {{-- <p class="small text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p> --}}
                        </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection
