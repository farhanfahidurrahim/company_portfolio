<div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="{{ route('home') }}"><span>Far</span>Han <span>Port</span>Folio</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a href="{{ route('home') }}" class="active">Home</a></li>

        {{-- <li><a href="{{ route('frontend.about') }}">About</a></li> --}}
        {{-- <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="about.html">About Us</a></li>
            <li><a href="team.html">Team</a></li>
            <li><a href="testimonials.html">Testimonials</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
          </ul>
        </li> --}}

        {{-- <li><a href="services.html">Services</a></li>
        <li><a href="portfolio.html">Portfolio</a></li> --}}
        {{-- <li><a href="pricing.html">Pricing</a></li> --}}
        <li><a href="{{ route('nav.gallery') }}">Gallery</a></li>
        <li><a href="{{ route('nav.news') }}">News</a></li>
        <li><a href="{{ route('nav.contact') }}">Contact</a></li>

      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    @php
        $social_link=DB::table('social_links')->first();
    @endphp
    <div class="header-social-links d-flex">
        <a href="{{ $social_link->facebook }}" target="_blank" class="facebook"><i class="bu bi-facebook"></i></a>
        <a href="{{ $social_link->instagram }}" target="_blank" class="instagram"><i class="bu bi-instagram"></i></a>
        <a href="{{ $social_link->twitter }}" target="_blank" class="twitter"><i class="bu bi-twitter"></i></a>
        <a href="{{ $social_link->linkedin }}" target="_blank" class="linkedin"><i class="bu bi-linkedin"></i></a>
    </div>

  </div>
