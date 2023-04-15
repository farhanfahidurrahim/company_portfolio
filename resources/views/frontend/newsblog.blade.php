@extends('frontend.layouts.master')
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>News</h2>
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>News</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            @foreach ($news as $row)
                <article class="entry">

                    <div class="entry-img">
                    <img src="{{ $row->photo }}" alt="" class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                    <a href="#">{{ $row->title }}</a>
                    </h2>

                    <div class="entry-meta">
                    <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">Admin</a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">{{ Carbon\Carbon::parse($row->created_at)->format('d M Y') }}</time></a></li>
                        {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li> --}}
                    </ul>
                    </div>

                    <div class="entry-content">
                    <p>
                        {{ $row->description }}
                    </p>
                    {{-- <div class="read-more">
                        <a href="blog-single.html">Read More</a>
                    </div> --}}
                    </div>
                </article>
                <hr>
                <br>
                <!-- End blog entry -->
            @endforeach

            {{-- <div class="blog-pagination">
              <ul class="justify-content-center">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
              </ul>
            </div> --}}

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              {{-- <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="#">General <span>(25)</span></a></li>
                  <li><a href="#">Lifestyle <span>(12)</span></a></li>
                  <li><a href="#">Travel <span>(5)</span></a></li>
                  <li><a href="#">Design <span>(22)</span></a></li>
                  <li><a href="#">Creative <span>(8)</span></a></li>
                  <li><a href="#">Educaion <span>(14)</span></a></li>
                </ul>
              </div><!-- End sidebar categories--> --}}
            @php
                $old_news=App\Models\News::where('status','active')->orderBy('id','ASC')->get()
            @endphp
            <h3 class="sidebar-title">Previous News</h3>
            @foreach ($old_news as $pn)
            <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="{{ $pn->photo }}" alt="">
                  <h4><a href="blog-single.html">{{ $pn->title }}</a></h4>
                  <time datetime="2020-01-01">{{ Carbon\Carbon::parse($pn->created_at)->format('d M Y') }}</time>
                </div>

            </div><!-- End sidebar recent posts-->
            @endforeach
              {{-- <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End sidebar tags--> --}}

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->

@endsection
